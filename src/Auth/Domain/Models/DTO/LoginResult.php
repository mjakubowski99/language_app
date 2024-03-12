<?php

namespace Auth\Domain\Models\DTO;

use Auth\Domain\Contracts\IAuth;
use Auth\Domain\Contracts\ILoginResult;

final class LoginResult implements ILoginResult
{
    public function __construct(
        private readonly bool      $success,
        private readonly ?IAuth   $user,
        private readonly ?string   $token,
        private readonly ?string   $fail_reason
    ) {}

    public function success(): bool
    {
        return $this->success;
    }

    public function getUser(): ?IAuth
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
