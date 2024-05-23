<?php

namespace Gateways\Exercise\Models;

class QuizWrite
{
    public function __construct(
        private readonly string $name,
        private readonly array $questions,
        private readonly int $answer_seconds,
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getQuestions(): array
    {
        return $this->questions;
    }

    public function getAnswerSeconds(): int
    {
        return $this->answer_seconds;
    }
}
