<?php

declare(strict_types=1);

namespace User\Infrastructure\Repositories;

use Shared\Utils\ValueObjects\Uuid;
use User\Domain\Repositories\IUserRepository;
use User\Infrastructure\Models\User;
use Shared\User\IUser;

class UserRepository implements IUserRepository
{
    public function __construct(
        private readonly User $user
    ) {}

    public function find(Uuid $user_id): ?IUser
    {
        /** @var ?IUser */
        return $this->user->newQuery()
            ->where('id', (string) $user_id)
            ->first();
    }

    public function findByEmail(string $email): ?IUser
    {
        /** @var ?IUser */
        return $this->user->newQuery()
            ->where('email', $email)
            ->first();
    }
}
