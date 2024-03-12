<?php

declare(strict_types=1);

namespace Student\Infrastructure\Models;

use Student\Infrastructure\Factories\StudentFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Shared\Enum\TokenMorph;
use Shared\Utils\ValueObjects\Uuid;
use Student\Domain\Contracts\IStudent;

/**
 * @property string $id
 * @property string $email
 * @property string $password
 */
class Student extends Authenticatable implements IStudent
{
    use HasUuids, HasApiTokens, HasFactory;

    protected static function newFactory(): Factory
    {
        return StudentFactory::new();
    }

    public function getMorphClass(): string
    {
        return TokenMorph::STUDENT->value;
    }

    public function getId(): Uuid
    {
        return Uuid::fromString($this->id);
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getUserType(): string
    {
        return $this->getMorphClass();
    }
}
