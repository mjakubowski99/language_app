<?php

declare(strict_types=1);

namespace Gateways\Student\Models;

use Shared\Utils\ValueObjects\Uuid;

final class Student
{
    public function __construct(
        private readonly Uuid $uuid,
        private readonly string $email,
        private readonly string $password,
    ) {}

    public function getId(): Uuid
    {
        return $this->uuid;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
