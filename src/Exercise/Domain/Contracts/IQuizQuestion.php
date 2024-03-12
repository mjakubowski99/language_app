<?php

declare(strict_types=1);

namespace Exercise\Domain\Contracts;

use Shared\Utils\ValueObjects\Uuid;

interface IQuizQuestion
{
    public function getId(): Uuid;

    public function getQuestion(): string;

    public function hasMultipleAnswers(): bool;

    /** @return IQuestionAnswer[] */
    public function getAnswers(): array;
}
