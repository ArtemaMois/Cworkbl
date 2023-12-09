<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{

    public function definition(): array
    {
        return [
            'title' => fake()->word(),
            'body' => fake()->sentence(),
            'created_at' => fake()->date('d.m.Y H:i'),
            'updated_at' => fake()->date('d.m.Y H:i')
        ];
    }
}
