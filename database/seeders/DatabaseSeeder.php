<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserTask;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);

        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(TaskSeeder::class);
        $this->call(UserTaskSeeder::class);
        $this->call(StateSeeder::class);
        $this->call(TaskStateSeeder::class);
    }
}
