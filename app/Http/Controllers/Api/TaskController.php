<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return Task::with(['tasks_state'])->get();
    }

    public function show(string $taskId)
    {
        $task = Task::where('id', $taskId)->with(['comments.user'])->first();
        return $task;
    }

    public function updateState(Request $request)
    {
        $task = Task::where('id', $request->id)->first();

    }
}
