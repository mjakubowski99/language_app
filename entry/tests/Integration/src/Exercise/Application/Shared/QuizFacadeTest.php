<?php

declare(strict_types=1);

namespace Tests\Integration\src\Exercise\Application\Shared;

use Exercise\Application\Facades\ExerciseFacade;
use Gateways\Exercise\Models\QuizAnswerWrite;
use Gateways\Exercise\Models\QuizQuestionWrite;
use Gateways\Exercise\Models\QuizWrite;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class QuizFacadeTest extends TestCase
{
    use DatabaseTransactions;

    private ExerciseFacade $facade;

    protected function setUp(): void
    {
        parent::setUp();
        $this->facade = $this->app->make(ExerciseFacade::class);
    }

    public function test_create_ShouldCreateQuiz(): void
    {
        // GIVEN
        $answer = new QuizAnswerWrite(1, 'Answer', true);
        $question = new QuizQuestionWrite('Question', [$answer]);
        $quiz = new QuizWrite('Name', [$question], 10);

        // WHEN
        $result = $this->facade->createQuiz($quiz);

        // THEN
        $this->assertDatabaseHas('quizes', [
            'id' => (string) $result->getId()
        ]);
    }
}
