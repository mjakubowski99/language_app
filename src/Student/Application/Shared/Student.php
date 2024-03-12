<?php

declare(strict_types=1);

namespace Student\Application\Shared;

use Shared\Student\IStudent;
use Shared\Utils\ValueObjects\Uuid;

class Student implements IStudent
{
    public function __construct(
        private readonly Uuid $id,
        private readonly string $email,
        private readonly string $password,
    ) {}

    public function getId(): Uuid
    {
        return $this->id;
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
