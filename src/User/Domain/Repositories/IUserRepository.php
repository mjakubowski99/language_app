<?php

declare(strict_types=1);

namespace User\Domain\Repositories;

use Shared\User\IUser;
use Shared\Utils\ValueObjects\Uuid;

interface IUserRepository
{
    public function find(Uuid $user_id): ?IUser;

    public function findByEmail(string $email): ?IUser;
}
