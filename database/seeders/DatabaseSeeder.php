<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::factory(100)->create();

        // John from Prine
        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@prine.ch',
        ]);

        // Jane from Prine
        User::factory()->create([
            'name' => 'Jane Doe',
            'email' => 'jane@prine.ch',
        ]);
    }
}
