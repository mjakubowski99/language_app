<?php

namespace Exercise\Domain\Contracts;

use Gateways\Contracts\Exercise\IQuizQuestion;
use Shared\Utils\ValueObjects\Uuid;

interface IQuiz
{
    public function getId(): Uuid;

    public function getName(): string;

    public function getAnswerSeconds(): int;

    /** @return IQuizQuestion[] */
    public function getQuestions(): array;
}
