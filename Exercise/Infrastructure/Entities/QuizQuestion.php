<?php

declare(strict_types=1);

namespace Exercise\Infrastructure\Entities;

use Exercise\Domain\Contracts\IQuizQuestion;
use Exercise\Infrastructure\Factories\QuizQuestionFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Shared\Utils\ValueObjects\Uuid;

class QuizQuestion extends Model implements IQuizQuestion
{
    protected $table = 'quiz_questions';

    protected $guarded = [];

    use HasFactory;
    use HasUuids;

    protected static function newFactory(): Factory
    {
        return QuizQuestionFactory::new();
    }

    public function getId(): Uuid
    {
        return Uuid::fromString($this->id);
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
        return $this->answers->all();
    }

    public function answers(): HasMany
    {
        return $this->hasMany(QuizAnswer::class, 'quiz_question_id');
    }
}
