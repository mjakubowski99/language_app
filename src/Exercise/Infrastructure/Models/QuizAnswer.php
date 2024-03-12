<?php

namespace Exercise\Infrastructure\Models;

use Exercise\Domain\IQuiz\IQuestionAnswer;
use Exercise\Infrastructure\Factories\QuizAnswerFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Shared\Utils\ValueObjects\Uuid;

class QuizAnswer extends Model implements IQuestionAnswer
{
    use HasUuids, HasFactory;

    protected static function newFactory(): Factory
    {
        return QuizAnswerFactory::new();
    }

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
