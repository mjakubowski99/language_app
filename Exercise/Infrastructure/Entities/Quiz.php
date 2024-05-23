<?php

declare(strict_types=1);

namespace Exercise\Infrastructure\Entities;

use Exercise\Domain\Contracts\IQuiz;
use Exercise\Infrastructure\Factories\QuizFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Shared\Utils\ValueObjects\Uuid;

class Quiz extends Model implements IQuiz
{
    protected $table = 'quizes';

    protected $guarded = [];

    use HasFactory;
    use HasUuids;

    protected static function newFactory(): Factory
    {
        return QuizFactory::new();
    }

    public function getId(): Uuid
    {
        return Uuid::fromString($this->id);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAnswerSeconds(): int
    {
        return $this->answer_seconds;
    }

    public function getQuestions(): array
    {
        return $this->questions->all();
    }

    public function questions(): HasMany
    {
        return $this->hasMany(QuizQuestion::class, 'quiz_id');
    }
}
