<?php

declare(strict_types=1);

namespace Exercise\Application\UseCases;

use Exercise\Domain\Contracts\IQuiz;
use Exercise\Domain\Services\QuizService;
use Shared\Utils\ValueObjects\Uuid;

class FindQuiz
{
    public function __construct(
        private readonly QuizService $service
    ) {}

    public function find(Uuid $uuid): IQuiz
    {
        return $this->service->find($uuid);
    }
}
