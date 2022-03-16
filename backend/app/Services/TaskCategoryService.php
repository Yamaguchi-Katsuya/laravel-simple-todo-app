<?php

namespace App\Services;

use App\Http\Requests\TaskCategoryRequest;
use App\Models\TaskCategory;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class TaskCategoryService
{
    private TaskCategory $taskCategory;

    public function __construct(TaskCategory $taskCategory)
    {
        $this->taskCategory = $taskCategory;
    }

        /**
     * @return Collection
     */
    public function getMyTaskCategories(): Collection
    {
        return $this->taskCategory
            ->where('created_by', Auth::id())
            ->get();
    }

    /**
     * @param int $id
     * @return TaskCategory|null
     */
    public function getMyTaskCategoryById(int $id): TaskCategory|null
    {
        return $this->taskCategory
            ->where([
                ['id', '=', $id],
                ['created_by', '=', Auth::id()]
            ])
            ->first();
    }

    /**
     * @return Collection
     */
    public function getAllCategory(): Collection
    {
        return collect($this->taskCategory->get(['id', 'name'])->pluck('name', 'id'));
    }

    /**
     * @param taskCategoryRequest $taskCategoryRequest
     * @return string $error
     */
    public function create(TaskCategoryRequest $taskCategoryRequest): string
    {
        $error = '';

        try {
            $params = $taskCategoryRequest->except('_token');
            $params['created_by'] = Auth::id();
            $this->taskCategory->create($params);
        } catch(Exception) {
            $error = '登録に失敗しました。';
        }

        return $error;
    }

    /**
     * @param int $id
     * @param taskCategoryRequest $taskCategoryRequest
     * @return string $error
     */
    public function update(int $id, taskCategoryRequest $taskCategoryRequest): string
    {
        $error = '';

        try {
            $update = [
                'name' => $taskCategoryRequest->name,
            ];
            $this->taskCategory->where('id', $id)->update($update);
        } catch(Exception) {
            $error = '更新に失敗しました。';
        }

        return $error;
    }
}
