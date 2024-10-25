<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filePath = storage_path('../database/data/users.csv');
        if (($handle = fopen($filePath, 'r')) !== false) {
            // Пропускаем заголовок
            fgetcsv($handle);

            // Читаем данные построчно
            while (($data = fgetcsv($handle)) !== false) {
                User::create([
                    'login' => $data[0],
                    'name' => $data[1],
                    'surname' => $data[2],
                    'patronymic' => $data[3],
                    'password' => Hash::make($data[4]),
                    'email' => $data[5],
                    'specialization' => $data[6],
                ]);
            }

            fclose($handle);
        }
    }
}
