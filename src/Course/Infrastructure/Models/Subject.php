<?php

declare(strict_types=1);

namespace Course\Infrastructure\Models;

use Course\Domain\Contracts\ISubject;
use Course\Infrastructure\Factories\SubjectFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Shared\Utils\ValueObjects\Uuid;

class Subject extends Model implements ISubject
{
    use HasUuids, HasFactory;

    protected $table = 'subjects';

    protected $guarded = [];

    protected static function newFactory(): Factory
    {
        return new SubjectFactory();
    }

    public function getId(): Uuid
    {
        return Uuid::fromString($this->id);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getCourseId(): Uuid
    {
        return Uuid::fromString($this->course_id);
    }

    public function getWords(): array
    {
        return $this->words->all();
    }

    public function words(): BelongsToMany
    {
        return $this->belongsToMany(Word::class, 'subject_words', 'subject_id', 'word_id');
    }
}
