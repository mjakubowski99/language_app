<?php

declare(strict_types=1);

namespace User\Infrastructure\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Shared\Enum\TokenMorph;
use Shared\User\IUser;
use Shared\Utils\ValueObjects\Uuid;
use User\Infrastructure\Factories\UserFactory;

/**
 * @property string $id
 * @property string $email
 * @property string $password
 */
class User extends Authenticatable implements IUser
{
    use HasUuids, HasApiTokens, HasFactory;

    protected static function newFactory(): Factory
    {
        return UserFactory::new();
    }

    public function getMorphClass(): string
    {
        return TokenMorph::USER->value;
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

    public function getModelName(): string
    {
        return $this->getMorphClass();
    }
}
