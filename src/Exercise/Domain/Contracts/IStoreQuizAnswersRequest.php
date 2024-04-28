<?php

declare(strict_types=1);

namespace Exercise\Domain\Contracts;

use Shared\Utils\ValueObjects\Uuid;

interface IStoreQuizAnswersRequest
{
    public function getQuizId(): Uuid;

    public function getStudentId(): Uuid;

    /** @return Uuid[] */
    public function getAnswerIds(): array;
}
