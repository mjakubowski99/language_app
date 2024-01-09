<?php

declare(strict_types=1);

namespace Auth\Domain\Repositories;

use Auth\Domain\Contracts\IPersonalAccessToken;
use Shared\User\IUser;

interface ITokenRepository
{
    public function createToken(IUser $user, string $plain_text_token): IPersonalAccessToken;

    public function removeToken(string $token): void;
}
