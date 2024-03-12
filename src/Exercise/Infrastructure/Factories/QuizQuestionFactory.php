<?php

declare(strict_types=1);

namespace Exercise\Infrastructure\Factories;

use Exercise\Infrastructure\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuizQuestionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'quiz_id' => Quiz::factory()->create()->id,
            'question' => $this->faker->name,
        ];
    }
}
