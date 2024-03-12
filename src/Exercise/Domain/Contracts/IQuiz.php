<?php

declare(strict_types=1);

namespace Exercise\Domain\Contracts;

interface IQuiz
{
    public function getId(): int;

    public function getName(): string;

    /** @return IQuizQuestion[] */
    public function getQuestions(): array;
}
