<?php

declare(strict_types=1);

namespace Exercise\Infrastructure\Models;

use Exercise\Domain\IQuiz\IQuizQuestion;
use Exercise\Infrastructure\Factories\QuizQuestionFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Shared\Utils\ValueObjects\Uuid;

class QuizQuestion extends Model implements IQuizQuestion
{
    use HasFactory;

    protected static function newFactory(): Factory
    {
        return QuizQuestionFactory::new();
    }

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
        return $this->answers->count() > 1;
    }

    public function getAnswers(): array
    {
        return $this->answers;
    }

    public function answers(): HasMany
    {
        return $this->hasMany(QuizAnswer::class, 'quiz_answer_id');
    }
}
