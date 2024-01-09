<?php

declare(strict_types=1);

namespace User\Domain\Services;

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
}
