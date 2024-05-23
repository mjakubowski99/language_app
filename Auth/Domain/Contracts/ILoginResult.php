<?php

declare(strict_types=1);

namespace Auth\Domain\Contracts;

interface ILoginResult
{
    public function success(): bool;

    public function getUser(): ?IAuth;

    public function getToken(): ?string;

    public function getFailReason(): ?string;
}
