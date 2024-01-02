<?php

declare(strict_types=1);

namespace Auth\Domain\Services;

use Auth\Domain\Repositories\ITokenRepository;
use Shared\User\IUser;

class TokenService
{
    public function __construct(
        private readonly ITokenRepository $repository
    ) {}

    public function createToken(IUser $user): string
    {
        return $this->repository->createToken($user);
    }
}
