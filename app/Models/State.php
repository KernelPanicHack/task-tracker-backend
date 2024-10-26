<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class State extends Model
{
    use HasFactory;

    protected $fillable =[
        'name'
    ];

    public function tasks_state(): BelongsTo {
        return $this->belongsTo(TaskState::class, 'state_id', 'id');
    }
}
