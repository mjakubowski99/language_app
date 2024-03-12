<?php

declare(strict_types=1);

namespace Exercise\Infrastructure\Factories;

use Exercise\Infrastructure\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuizFactory extends Factory
{
    protected $model = Quiz::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'answer_time' => $this->faker->randomNumber() * 10,
        ];
    }
}
