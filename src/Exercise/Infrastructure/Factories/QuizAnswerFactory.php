<?php

declare(strict_types=1);

namespace Exercise\Infrastructure\Factories;

use Exercise\Infrastructure\Models\QuizQuestion;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuizAnswerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'quiz_question_id' => QuizQuestion::factory()->create(),
            'answer' => $this->faker->word,
            'order' => $this->faker->randomDigit(),
            'is_valid' => !$this->faker->randomDigit(),
        ];
    }
}
