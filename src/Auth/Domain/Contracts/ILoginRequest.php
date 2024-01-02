<?php

declare(strict_types=1);

namespace Auth\Domain\Contracts;

interface ILoginRequest
{
    public function getEmail(): string;

    public function getUserPassword(): string;

    public function getDeviceName(): string;
}
