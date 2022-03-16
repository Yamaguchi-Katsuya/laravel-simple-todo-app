<?php

namespace App\Models;

use App\Models\TaskCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_category_id',
        'title',
        'description',
        'is_finished',
        'created_by',
    ];

    public function category()
    {
        return $this->hasOne(TaskCategory::class, 'id', 'task_category_id');
    }
}
