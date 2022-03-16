<?php

namespace App\Services;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class TaskService
{
    private Task $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    /**
     * @return Collection
     */
    public function getMyTasks(): Collection
    {
        return $this->task
            ->with('category')
            ->where('created_by', Auth::id())
            ->get();
    }

    /**
     * @param int $id
     * @return Task|null
     */
    public function getMyTaskById(int $id): Task|null
    {
        return $this->task
            ->with('category')
            ->where([
                ['id', '=', $id],
                ['created_by', '=', Auth::id()]
            ])
            ->first();
    }

    /**
     * @param TaskRequest $taskRequest
     * @return string $error
     */
    public function createTask(TaskRequest $taskRequest): string
    {
        $error = '';

        // return 'Register failed.';

        try {
            $params = $taskRequest->except('_token');
            $params['created_by'] = Auth::id();
            $this->task->create($params);
        } catch(Exception) {
            $error = 'Register failed.';
        }

        return $error;
    }

    /**
     * @param int $id
     * @param taskRequest $taskRequest
     * @return string $error
     */
    public function update(int $id, taskRequest $taskRequest): string
    {
        $error = '';

        try {
            $update = [
                'title' => $taskRequest->title,
                'description' => $taskRequest->description,
                'task_category_id' => $taskRequest->task_category_id,
            ];
            $this->task->where('id', $id)->update($update);
        } catch(Exception) {
            $error = '更新に失敗しました。';
        }

        return $error;
    }
}
