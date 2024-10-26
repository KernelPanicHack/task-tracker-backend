<?php
namespace App\Exports;

use App\Models\State;
use App\Models\Task;
use App\Models\TaskState;
use App\Models\User;
use App\Models\UserTask;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TasksExport implements FromArray, WithHeadings
{
    public function headings(): array
    {
        // Используем столбец 'name' в качестве заголовков
        return State::pluck('name')->toArray();
    }

    public function array(): array
    {
        $states = State::all();
        $data = [];
        $maxTasks = 0;

        foreach ($states as $state) {
            // Получаем задачи, связанные с текущим состоянием
            $taskIds = TaskState::where('state_id', $state->id)->pluck('task_id');
            $tasks = Task::whereIn('id', $taskIds)->get();

            // Формируем список задач с указанием пользователя
            $taskData = $tasks->map(function ($task) {
                // Находим ID пользователя в таблице user_tasks
                $userTask = UserTask::where('task_id', $task->id)->first();

                if ($userTask) {
                    // Получаем пользователя
                    $user = User::find($userTask->user_id);
                    $userName = $user ? "{$user->surname} {$user->name} {$user->patronymic}" : 'Без пользователя';
                } else {
                    $userName = 'Без пользователя';
                }

                return "{$task->title} ({$userName})";
            })->toArray();

            // Определяем максимальное количество задач, чтобы выровнять таблицу
            $maxTasks = max($maxTasks, count($taskData));

            // Добавляем задачи для каждого состояния
            $data[] = $taskData;
        }

        // Выровняем строки, добавив null для пустых ячеек
        foreach ($data as &$tasks) {
            while (count($tasks) < $maxTasks) {
                $tasks[] = null;
            }
        }

        // Транспонируем массив для отображения задач под каждым заголовком
        return array_map(null, ...$data);
    }
}


