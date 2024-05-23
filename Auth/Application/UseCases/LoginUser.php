<?php

declare(strict_types=1);

namespace Auth\Application\UseCases;

use Auth\Domain\Contracts\ILoginRequest;
use Auth\Domain\Contracts\ILoginResult;
use Auth\Domain\Services\LoginService;

final class LoginUser
{
    public function __construct(
        private readonly LoginService $service
    ) {}

    public function login(ILoginRequest $request): ILoginResult
    {
        return $this->service->login($request);
    }
}
