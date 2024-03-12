<?php

declare(strict_types=1);

namespace Exercise\Domain\Contracts;

use Shared\Utils\ValueObjects\Uuid;

interface IUserAnswerRequest
{
    public function getQuizId(): Uuid;

    public function getQuizAnswerId(): Uuid;

    public function getUserId(): Uuid;
}
