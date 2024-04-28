<?php

declare(strict_types=1);

namespace Exercise\Infrastructure\Factories;

use Exercise\Infrastructure\Entities\QuizAnswer;
use Exercise\Infrastructure\Entities\QuizQuestion;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuizAnswerFactory extends Factory
{
    protected $model = QuizAnswer::class;

    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'quiz_question_id' => QuizQuestion::factory()->create()->id,
            'answer' => $this->faker->word,
            'order' => $this->faker->randomDigit(),
            'is_valid' => !$this->faker->randomDigit(),
        ];
    }
}
