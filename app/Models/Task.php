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

    public function orders() {
        return $this->hasMany(Order::class, 'task_id', 'id');
    }

    public function carts() {
        return $this->belongsToMany(Cart::class, 'orders', 'task_id', 'cart_id', 'id', 'id');
    }
}
