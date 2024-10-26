<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Task extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'task_body'
    ];


    public function tasks_state(): HasOneThrough
    {
        return $this->hasOneThrough(State::class, TaskState::class, 'task_id', 'id', 'id', 'state_id');
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class,  'task_id', 'id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'task_id', 'id');
    }
}
