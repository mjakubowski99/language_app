<?php

declare(strict_types=1);

namespace Auth\Application\UseCases;

use Auth\Domain\Services\TokenService;

final class LogoutUser
{
    public function __construct(
        private readonly TokenService $service
    ) {}

    public function logout(string $token): void
    {
        $this->service->removeToken($token);
    }
}
