<?php

declare(strict_types=1);

namespace Exercise\Infrastructure;

use Exercise\Domain\IQuiz\IQuiz;
use Exercise\Domain\Repositories\IQuizRepository;
use Exercise\Infrastructure\Models\Quiz;
use Shared\Utils\ValueObjects\Uuid;

class QuizRepository implements IQuizRepository
{
    public function __construct(
        private readonly Quiz $quiz
    ) {}

    public function find(Uuid $quiz_id): IQuiz
    {
        /** @var IQuiz */
        return $this->quiz
            ->newQuery()
            ->with('questions.answers')
            ->findOrFail($quiz_id);
    }
}
