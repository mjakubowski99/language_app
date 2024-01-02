<?php

declare(strict_types=1);

namespace User\Domain\Services;

use Shared\Utils\ValueObjects\Uuid;
use User\Domain\Repositories\IUserRepository;
use Shared\User\IUser;
use Shared\User\IUserService;

class UserService implements IUserService
{
    public function __construct(
        private readonly IUserRepository $repository
    ) {}

    public function findByEmail(string $email): ?IUser
    {
        return $this->repository->findByEmail($email);
    }

    public function createToken(IUser $user, string $token_name): string
    {
        return $this->repository->createToken($user, $token_name);
    }
}
