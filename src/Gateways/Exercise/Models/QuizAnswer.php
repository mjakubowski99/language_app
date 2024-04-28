<?php

namespace Gateways\Exercise\Models;

use Shared\Utils\ValueObjects\Uuid;

class QuizAnswer
{
    public function __construct(
        private readonly Uuid $id,
        private readonly int $order,
        private readonly string $answer,
        private readonly bool $is_valid,
    ) {}

    public function getId(): Uuid
    {
        return $this->id;
    }

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
