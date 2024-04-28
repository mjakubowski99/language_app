<?php

namespace Gateways\Exercise\Models;

class QuizQuestionWrite
{
    public function __construct(
        private readonly string $question,
        private readonly array $answers,
    ) {}

    public function getQuestion(): string
    {
        return $this->question;
    }

    public function getAnswers(): array
    {
        return $this->answers;
    }
}
