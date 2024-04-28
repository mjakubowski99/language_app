<?php

declare(strict_types=1);

namespace Exercise\Application\Facades;

use Exercise\Application\Mappers\QuizMapper;
use Exercise\Domain\Services\QuizService;
use Gateways\Exercise\IExerciseFacade;
use Gateways\Exercise\Models\Quiz;
use Gateways\Exercise\Models\QuizWrite;

class ExerciseFacade implements IExerciseFacade
{
    public function __construct(
        private readonly QuizService $service,
        private readonly QuizMapper $quiz_mapper,
    ) {}

    public function createQuiz(QuizWrite $quiz): Quiz
    {
        return $this->quiz_mapper->mapQuiz(
            $this->service->create($quiz)
        );
    }
}
