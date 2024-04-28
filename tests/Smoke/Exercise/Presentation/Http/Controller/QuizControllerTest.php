<?php

declare(strict_types=1);

namespace Tests\Smoke\Exercise\Presentation\Http\Controller;

use Exercise\Infrastructure\Entities\Quiz;
use Exercise\Infrastructure\Entities\QuizAnswer;
use Exercise\Infrastructure\Entities\QuizQuestion;
use Tests\TestCase;

class QuizControllerTest extends TestCase
{
    public function test_get_success(): void
    {
        // GIVEN
        $quiz = Quiz::factory()->create();
        $quiz_question = QuizQuestion::factory()->create(['quiz_id' => $quiz->id]);
        QuizAnswer::factory()->create(['quiz_question_id' => $quiz_question->id]);

        // WHEN
        $response = $this->json('GET', route('exercises.quiz', ['id' => $quiz->id]));

        // THEN
        $response->assertOk();
        $response->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'questions' => [
                    [
                        'id',
                        'question',
                        'has_multiple_answers',
                        'answers' => [
                            [
                                'id',
                                'answer',
                                'is_valid',
                            ]
                        ]
                    ]
                ]
            ]
        ]);
    }
}
