<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\constant\FormType;
use App\Models\Task;
use App\Services\TaskCategoryService;
use App\Services\TaskService;

class TaskController extends Controller
{
    /**
     * @param TaskService $taskService
     */
    public function index(TaskService $taskService)
    {
        $title = 'Task list';
        $myTasks = $taskService->getMyTasks();
        return view('tasks.index', compact('myTasks', 'title'));
    }

    /**
     * @param TaskCategoryService  $taskCategoryService
     */
    public function create(TaskCategoryService $taskCategoryService)
    {
        $type = FormType::CREATE;
        $taskCategories = $taskCategoryService->getAllCategory();
        return view('tasks.create', compact('taskCategories', 'type'));
    }

    /**
     * @param TaskRequest $taskRequest
     * @param TaskService  $taskService
     */
    public function store(TaskRequest $taskRequest, TaskService $taskService)
    {
        $error = $taskService->createTask($taskRequest);
        if ($error) {
            session()->flash('error', $error);
            return redirect()->route('tasks.create')->with(compact('error'));
        }

        session()->flash('success', 'Created successfully ');
        return redirect()->route('tasks.index');
    }

    /**
     * @param TaskService  $taskService
     * @param  int  $id
     */
    public function show(TaskService $taskService, int $id)
    {
        $title = 'Task detail';
        $task = $taskService->getMyTaskById($id);
        if (!$task) {
            session()->flash('error', 'Task is not found.');
            return redirect()->route('tasks.index');
        }
        return view('tasks.show', compact('task', 'title'));
    }

    /**
     * @param TaskService  $taskService
     * @param TaskCategoryService  $taskCategoryService
     * @param  int  $id
     */
    public function edit(
        TaskService $taskService,
        TaskCategoryService $taskCategoryService,
        int $id
    ) {
        $type = FormType::UPDATE;
        $task = $taskService->getMyTaskById($id);
        if (!$task) {
            session()->flash('error', 'Task is not found.');
            return redirect()->route('tasks.index');
        }
        $taskCategories = $taskCategoryService->getAllCategory();
        return view('tasks.edit', compact('task', 'taskCategories', 'type'));
    }

    /**
     * @param  TaskRequest  $taskRequest
     * @param TaskService $taskService
     * @param  int  $id
     */
    public function update(
        TaskRequest $taskRequest,
        TaskService $taskService,
        int $id
    ) {
        $error = $taskService->update($id, $taskRequest);
        if ($error) {
            session()->flash('error', $error);
            return redirect()
                ->route('tasks.edit', ['task' => $id])
                ->with(compact('error'));
        }

        session()->flash('success', 'Updated successfully.');
        return back();
    }

    /**
     * @param  int  $id
     * @return bool
     */
    public function destroy(int $id): bool
    {
        Task::destroy($id);
        session()->flash('success', 'Deleted successfully.');
        return true;
    }
}
