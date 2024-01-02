<?php

declare(strict_types=1);

namespace Auth\Domain\Contracts;

use Shared\User\IUser;

interface ILoginResult
{
    public function success(): bool;

    public function getUser(): ?IUser;

    public function getToken(): ?string;

    public function getFailReason(): ?string;
}
