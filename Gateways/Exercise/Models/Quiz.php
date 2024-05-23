<?php

namespace Gateways\Exercise\Models;

use Shared\Utils\ValueObjects\Uuid;

final class Quiz
{
    public function __construct(
        private readonly Uuid $id,
        private readonly string $name,
        private readonly int $answer_seconds,
        private readonly array $questions,
    ) {}

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getAnswerSeconds(): int
    {
        return $this->answer_seconds;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getQuestions(): array
    {
        return $this->questions;
    }
}
