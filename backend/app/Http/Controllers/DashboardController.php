<?php

namespace App\Http\Controllers;

use App\Services\TaskCategoryService;
use App\Services\TaskService;

class DashboardController extends Controller
{
    /**
     * @param TaskService $taskService
     * @param TaskCategoryService $taskCategoryService
     */
    public function index(TaskService $taskService, TaskCategoryService $taskCategoryService)
    {
        $taskTitle = 'Task list';
        $taskCategoryTitle = 'Task category list';
        $myTasks = $taskService->getMyTasks();
        $myTaskCategories = $taskCategoryService->getMyTaskCategories();
        return view('dashboard', compact('taskTitle', 'taskCategoryTitle', 'myTasks', 'myTaskCategories'));
    }
}
