<?php

namespace Database\Seeders;

use App\Models\TaskState;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filePath = storage_path('../database/data/task_states_2.csv');
        if (($handle = fopen($filePath, 'r')) !== false) {
            // Пропускаем заголовок
            fgetcsv($handle);

            // Читаем данные построчно
            while (($data = fgetcsv($handle)) !== false) {
                TaskState::create([
                'task_id' => $data[0],
                'state_id' => $data[1],
                ]);
            }

            fclose($handle);
        }
    }
}
