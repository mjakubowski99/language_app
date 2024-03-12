<?php

declare(strict_types=1);

namespace Auth\Application\UseCases;

use Auth\Domain\Services\LoginService;

final class RefreshLogin
{
    public function __construct(
        private readonly LoginService $service
    ) {}

    public function refresh(string $token): string
    {
        return $this->service->refreshLogin($token);
    }
}
