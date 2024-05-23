<?php

declare(strict_types=1);

namespace Exercise\Infrastructure\Factories;

use Exercise\Infrastructure\Entities\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuizFactory extends Factory
{
    protected $model = Quiz::class;

    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'name' => $this->faker->name,
            'answer_seconds' => $this->faker->randomDigit() * 10,
        ];
    }
}
