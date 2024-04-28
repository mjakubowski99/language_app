<?php

declare(strict_types=1);

namespace Exercise\Infrastructure\Factories;

use Exercise\Infrastructure\Entities\Quiz;
use Exercise\Infrastructure\Entities\QuizQuestion;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuizQuestionFactory extends Factory
{
    protected $model = QuizQuestion::class;

    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'quiz_id' => Quiz::factory()->create()->id,
            'question' => $this->faker->name,
        ];
    }
}
