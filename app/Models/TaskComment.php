<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//todo Delete this model and migration
class TaskComment extends Model
{
    use HasFactory;

    protected $fillable =[
        'task_id',
        'comment_id'
    ];
}
