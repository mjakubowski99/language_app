<?php

declare(strict_types=1);

namespace Auth\Domain\Services;

use Auth\Domain\Contracts\ILoginRequest;
use Auth\Domain\Contracts\ILoginResult;
use Auth\Domain\Factories\AuthProviderFactory;
use Auth\Domain\Models\DTO\LoginResult;
use Auth\Domain\Models\Enum\FailReason;
use Shared\Utils\Hash\IHash;

class LoginService
{
    public function __construct(
        private readonly IHash               $hash,
        private readonly AuthProviderFactory $provider_factory,
        private readonly TokenService        $token_service
    ) {}

    public function login(ILoginRequest $request): ILoginResult
    {
        $provider = $this->provider_factory->make($request->getUserType());

        $user = $provider->findByUniqueIdentity($request->getEmail());

        if ($user===null) {
            return $this->userNotFoundResult();
        }
        if (!$this->hash->check($request->getUserPassword(), $user->getPassword())) {
            return $this->userNotFoundResult();
        }

        $token = $this->token_service->createToken($user);

        return new LoginResult(true, $user, $token, null);
    }

    public function refreshLogin(string $token): string
    {
        return $this->token_service->refreshToken($token);
    }

    private function userNotFoundResult(): LoginResult
    {
        return new LoginResult(false, null, null, FailReason::USER_NOT_FOUND->value);
    }
}
