<?php

declare(strict_types=1);

namespace Exercise\Domain\Services;

use Exercise\Domain\IQuiz\IQuiz;
use Exercise\Domain\IQuiz\IUserAnswerRequest;
use Exercise\Domain\Repositories\IQuizRepository;
use Shared\Utils\ValueObjects\Uuid;

class QuizService
{
    public function __construct(
        private readonly IQuizRepository $repository
    ) {}

    public function find(Uuid $uuid): IQuiz
    {
        return $this->repository->find($uuid);
    }
}
