<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskState extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'state_id',
    ];

    public function task() {
        return $this->belongsTo(Task::class, 'task_id', 'id');
    }

    public function state() {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }
}
