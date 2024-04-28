<?php

declare(strict_types=1);

namespace Exercise\Domain\Repositories;

use Exercise\Domain\Contracts\IQuiz;
use Exercise\Domain\Contracts\IStoreQuizAnswersRequest;
use Gateways\Exercise\Models\QuizWrite;
use Shared\Utils\ValueObjects\Uuid;

interface IQuizRepository
{
    public function find(Uuid $quiz_id): IQuiz;

    /** @return Uuid[] */
    public function getValidAnswerIds(Uuid $quiz_id): array;

    public function create(QuizWrite $quiz): IQuiz;

    public function storeResult(Uuid $student_id, Uuid $quiz_id, float $score);
}
