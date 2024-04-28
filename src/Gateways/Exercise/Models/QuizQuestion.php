<?php

namespace Gateways\Exercise\Models;

use Shared\Utils\ValueObjects\Uuid;

class QuizQuestion
{
    public function __construct(
        private readonly Uuid $id,
        private readonly string $question,
        private readonly bool $has_multiple_answers,
        private readonly array $answers,
    ) {}

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getQuestion(): string
    {
        return $this->question;
    }

    public function hasMultipleAnswers(): bool
    {
        return $this->has_multiple_answers;
    }

    public function getAnswers(): array
    {
        return $this->answers;
    }
}
