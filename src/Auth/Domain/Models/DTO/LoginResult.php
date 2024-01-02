<?php

namespace Auth\Domain\Models\DTO;

use Auth\Domain\Contracts\ILoginResult;
use Shared\User\IUser;

final class LoginResult implements ILoginResult
{
    public function __construct(
        private readonly bool $success,
        private readonly ?IUser $user,
        private readonly ?string $token,
        private readonly ?string $fail_reason
    ) {}

    public function success(): bool
    {
        return $this->success;
    }

    public function getUser(): ?IUser
    {
        return $this->user;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function getFailReason(): ?string
    {
        return $this->fail_reason;
    }
}
