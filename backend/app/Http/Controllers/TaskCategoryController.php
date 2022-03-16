<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskCategoryRequest;
use App\Models\constant\FormType;
use App\Models\TaskCategory;
use App\Services\TaskCategoryService;

class TaskCategoryController extends Controller
{
    /**
     * @param TaskCategoryService $taskCategoryService
     */
    public function index(TaskCategoryService $taskCategoryService)
    {
        $title = 'Task category list';
        $myTaskCategories = $taskCategoryService->getMyTaskCategories();
        return view('taskCategories.index', compact('myTaskCategories', 'title'));
    }

    public function create()
    {
        $type = FormType::CREATE;
        return view('taskCategories.create', compact('type'));
    }

    /**
     * @param TaskCategoryRequest $taskCategoryRequest
     * @param TaskCategoryService $taskCategoryService
     */
    public function store(TaskCategoryRequest $taskCategoryRequest, TaskCategoryService $taskCategoryService)
    {
        $error = $taskCategoryService->create($taskCategoryRequest);
        if (!empty($error)) {
            session()->flash('error', $error);
            return redirect()->route('task-categories.create');
        }

        session()->flash('success', 'Created successfully.');
        return redirect()->route('task-categories.index');
    }

    /**
     * @param TaskCategoryService $taskCategoryService
     * @param  int  $id
     */
    public function show(TaskCategoryService $taskCategoryService, int $id)
    {
        $title = 'Task category detail';
        $taskCategory = $taskCategoryService->getMyTaskCategoryById($id);
        if (!$taskCategory) {
            session()->flash('error', 'Task category is not found.');
            return redirect()->route('task-categories.index');
        }
        return view('taskCategories.show', compact('taskCategory', 'title'));
    }

    /**
     * @param TaskCategoryService $taskCategoryService
     * @param  int  $id
     */
    public function edit(TaskCategoryService $taskCategoryService, int $id)
    {
        $type = FormType::UPDATE;
        $taskCategory = $taskCategoryService->getMyTaskCategoryById($id);
        if (!$taskCategory) {
            session()->flash('error', 'Task category is not found.');
            return redirect()->route('task-categories.index');
        }
        return view('taskCategories.edit', compact('taskCategory', 'type'));
    }

    /**
     * @param  TaskCategoryRequest  $taskCategoryRequest
     * @param TaskCategoryService $taskCategoryService
     * @param  int  $id
     */
    public function update(
        TaskCategoryRequest $taskCategoryRequest,
        TaskCategoryService $taskCategoryService,
        int $id
    ) {
        $error = $taskCategoryService->update($id, $taskCategoryRequest);
        if ($error) {
            session()->flash('error', $error);
            return redirect()->route('task-categories.edit', ['task_category' => $id]);
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
        TaskCategory::destroy($id);
        session()->flash('success', 'Deleted successfully.');
        return true;
    }
}
