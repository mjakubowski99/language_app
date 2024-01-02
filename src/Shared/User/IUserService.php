<?php

declare(strict_types=1);

namespace Shared\User;

interface IUserService
{
    public function findByEmail(string $email): ?IUser;

    public function createToken(IUser $user, string $token_name): string;
}
