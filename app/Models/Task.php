<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Task extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'task_body'
    ];



    public function task_comments(): HasMany
    {
        return $this->hasMany(TaskComment::class, 'task_id', 'id');
    }

    public function tasks_state(): HasOne
    {
        return $this->hasOne(TaskState::class,  'task_id', 'id',);
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class,  'task_id', 'id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(TaskComment::class, 'task_id', 'id');
    }
}
