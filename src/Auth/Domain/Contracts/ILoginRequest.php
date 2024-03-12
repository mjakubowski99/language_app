<?php

declare(strict_types=1);

namespace Auth\Domain\Contracts;

use Shared\Enum\UserType;

interface ILoginRequest
{
    public function getEmail(): string;

    public function getUserPassword(): string;

    public function getDeviceName(): string;

    public function getUserType(): UserType;
}
