<?php

declare(strict_types=1);

namespace Auth\Domain\Models\DTO;

use Auth\Domain\Contracts\IAuth;
use Shared\Enum\UserType;
use Shared\Utils\ValueObjects\Uuid;

class Auth implements IAuth
{
    public function __construct(
        private readonly Uuid $id,
        private readonly string $unique_identity,
        private readonly string $password,
        private readonly UserType $user_type,
    ) {}

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getUniqueIdentity(): string
    {
        return $this->unique_identity;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getUserType(): UserType
    {
        return $this->user_type;
    }
}
