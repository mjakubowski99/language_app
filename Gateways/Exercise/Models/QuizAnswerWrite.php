<?php

namespace Gateways\Exercise\Models;

class QuizAnswerWrite
{
    public function __construct(
        private readonly int $order,
        private readonly string $answer,
        private readonly bool $is_valid,
    ) {}

    public function getOrder(): int
    {
        return $this->order;
    }

    public function getAnswer(): string
    {
        return $this->answer;
    }

    public function isValid(): bool
    {
        return $this->is_valid;
    }
}
