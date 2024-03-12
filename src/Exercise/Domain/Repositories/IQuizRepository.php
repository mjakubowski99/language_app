<?php

declare(strict_types=1);

namespace Exercise\Domain\Repositories;

use Exercise\Domain\IQuiz\IQuiz;
use Shared\Utils\ValueObjects\Uuid;

interface IQuizRepository
{
    public function find(Uuid $quiz_id): IQuiz;
}
