<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    const OPEN = 1;
    const COMPLETED = 2;
    const CANCELLED = 3;

    protected $fillable = ['user_id', 'title', 'expiration_date', 'description', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subtasks()
    {
        return $this->hasMany(SubTask::class);
    }

}
