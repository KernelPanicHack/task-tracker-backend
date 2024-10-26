<?php

namespace App\Http\Controllers\Api;

use App\Exports\TasksExport;
use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\TaskState;
use http\Env\Response;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
class TaskController extends Controller
{
    public function index()
    {
        return Task::with(['tasks_state', 'users'])->get();
    }

    public function show(string $taskId)
    {
        $task = Task::where('id', $taskId)->with(['comments.user'])->first();
        return $task;
    }

    public function updateState(Request $request, string $taskId)
    {
        $taskState = TaskState::where('task_id', $taskId)->first();
        $taskState->update([
            'state_id'=> $request->state_id
        ]);
        return response([
            'message' => 'state is changed',
        ]);


    }

    public function update(Request $request, string $taskId)
    {
        $task = Task::where('id', $taskId)->first();

        if ($task->update($request->all())){
            return response([
                'mesage' => 'task updated'
            ]);
        }
    }

    public function delete(string $taskId)
    {
        Task::where('id', $taskId)->firstOrFail()->delete();
        return response([
            'message' => 'task deleted!',
        ]);
    }

    public function export()
    {
        $fileName = 'tasks_export.xlsx';
        Excel::store(new TasksExport, $fileName, 'public');

        return Excel::download(new TasksExport, $fileName);
    }
}
