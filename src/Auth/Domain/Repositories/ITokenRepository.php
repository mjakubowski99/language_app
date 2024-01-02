<?php

declare(strict_types=1);

namespace Auth\Domain\Repositories;

use Shared\User\IUser;

interface ITokenRepository
{
    public function createToken(IUser $user): string;
}
