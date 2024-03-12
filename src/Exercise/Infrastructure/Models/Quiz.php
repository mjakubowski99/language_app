<?php

declare(strict_types=1);

namespace Exercise\Infrastructure\Models;

use Exercise\Domain\IQuiz\IQuiz;
use Exercise\Infrastructure\Factories\QuizFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Student\Infrastructure\Factories\StudentFactory;

class Quiz extends Model implements IQuiz
{
    use HasFactory;

    protected static function newFactory(): Factory
    {
        return QuizFactory::new();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getQuestions(): array
    {
        return $this->questions;
    }

    public function questions(): HasMany
    {
        return $this->hasMany(QuizQuestion::class, 'quiz_question_id');
    }
}
