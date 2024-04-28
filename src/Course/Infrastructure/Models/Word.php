<?php

declare(strict_types=1);

namespace Course\Infrastructure\Models;

use Course\Domain\Contracts\IWord;
use Course\Infrastructure\Factories\WordFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Shared\Utils\ValueObjects\Uuid;

class Word extends Model implements IWord
{
    use HasUuids, HasFactory;

    protected $table = 'words';

    protected static function newFactory(): Factory
    {
        return new WordFactory();
    }

    public function getId(): Uuid
    {
        return Uuid::fromString($this->id);
    }

    public function getWord(): string
    {
        return $this->word;
    }

    public function getTranslation(): string
    {
        return $this->translation;
    }
}
