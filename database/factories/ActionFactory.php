<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Action>
 */
class ActionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'module' => 'lorem',
            'name' => 'ipsum-dolor-sit',
            'date' => now()->addDays(rand(-100, -3)),
            'data' => [
                'title' => 'Amet',
                'content' => 'Consectetur adipisicing elit',
            ]
        ];
    }
}
