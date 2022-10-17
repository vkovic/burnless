<?php

namespace Database\Seeders;

use App\Models\ModuleType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        ModuleType::factory([
            'name' => 'job-expectations',
            'data' => [
                'title' => 'Amet',
                'content' => 'Consectetur adipisicing elit',
            ]
        ]);

        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
