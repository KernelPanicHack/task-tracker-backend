<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserTask;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filePath = storage_path('../database/data/user_tasks_2.csv');
        if (($handle = fopen($filePath, 'r')) !== false) {
            // Пропускаем заголовок
            fgetcsv($handle);

            // Читаем данные построчно
            while (($data = fgetcsv($handle)) !== false) {
                UserTask::create([
                   'user_id' => $data[0],
                    'task_id' => $data[1],
                ]);
            }

            fclose($handle);
        }
    }
}
