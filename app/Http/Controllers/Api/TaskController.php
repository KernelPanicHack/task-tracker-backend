<?php

namespace App\Http\Controllers\Api;

use App\Exports\TasksExport;
use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\TaskState;
use App\Models\UserTask;
use http\Env\Response;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
class TaskController extends Controller
{
    public function index()
    {
        return Task::with(['tasks_state', 'users'])->orderBy('id')->get();
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

    public function create(Request $request)
    {
        $task = Task::create([
            'title' => $request->title,
            'task_body' => $request->task_body
        ]);

        if ($task){
            TaskState::create([
                'task_id' => $task->id,
                'state_id' => 1
            ]);
        }else{
            return \response([
                'message' => "Task cant created!"
            ], 401);
        }
        if ($request->user_id){
            UserTask::create([
               'task_id' => $task->id,
               'user_id' => $request->user_id,
            ]);
        }
        return response([
            'message' => 'task created!'
        ]);
    }
    public function export()
    {
        $fileName = 'tasks_export.xlsx';
        Excel::store(new TasksExport, $fileName, 'public');

        return Excel::download(new TasksExport, $fileName);
    }
}
