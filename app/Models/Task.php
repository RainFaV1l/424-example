<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Task extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $guarded = [];

    public function getTaskImagePath() {
        return asset('public' . Storage::url($this->task_image_path));
    }

    public function category() {
        return $this->belongsTo(TaskCategory::class, 'task_categories_id', 'id');
    }
}
