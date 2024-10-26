<?php

namespace App\Exports;

use App\Models\State;
use App\Models\Task;
use App\Models\TaskState;
use App\Models\User;
use App\Models\UserTask;
use App\Models\Comment; // Импортируем модель комментариев
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TasksExport implements FromArray, WithHeadings
{
    public function headings(): array
    {
        // Новые заголовки
        return ['Заголовок', 'Описание задачи', 'Ответственный', 'Комментарии'];
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

            foreach ($tasks as $task) {
                // Получаем ответственного пользователя
                $userTask = UserTask::where('task_id', $task->id)->first();
                $userName = 'Без пользователя'; // Значение по умолчанию

                if ($userTask) {
                    // Получаем пользователя
                    $user = User::find($userTask->user_id);
                    $userName = $user ? "{$user->surname} {$user->name} {$user->patronymic}" : $userName;
                }

                // Получаем комментарии по задаче
                $comments = Comment::where('task_id', $task->id)->pluck('text')->toArray();
                if ($comments) {
                    $commentsString = implode('; ', $comments); // Преобразуем массив комментариев в строку
                }else{
                    $commentsString = 'Без комментариев';
                }
                // Добавляем данные в массив
                $data[] = [
                    $task->title,           // Заголовок
                    $task->task_body,     // Описание задачи
                    $userName,              // Ответственный
                    $commentsString         // Комментарии
                ];
            }
        }

        return $data; // Возвращаем массив данных
    }
}
