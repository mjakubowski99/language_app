<?php

declare(strict_types=1);

namespace Auth\Domain\Services;

use Auth\Domain\Contracts\ILoginRequest;
use Auth\Domain\Contracts\ILoginResult;
use Auth\Domain\Models\DTO\LoginResult;
use Auth\Domain\Models\Enum\FailReason;
use Shared\User\IUserService;
use Shared\Utils\Hash\IHash;

class LoginService
{
    public function __construct(
        private readonly IHash $hash,
        private readonly IUserService $user_service,
        private readonly TokenService $token_service
    ) {}

    public function login(ILoginRequest $request): ILoginResult
    {
        $user = $this->user_service->findByEmail($request->getEmail());

        if ($user===null) {
            return $this->userNotFoundResult();
        }
        if (!$this->hash->check($request->getUserPassword(), $user->getPassword())) {
            return $this->userNotFoundResult();
        }

        $token = $this->token_service->createToken($user);

        return new LoginResult(true, $user, $token, null);
    }

    private function userNotFoundResult(): LoginResult
    {
        return new LoginResult(false, null, null, FailReason::USER_NOT_FOUND->value);
    }
}
