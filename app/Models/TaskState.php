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
}
