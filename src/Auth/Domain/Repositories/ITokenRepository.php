<?php

declare(strict_types=1);

namespace Auth\Domain\Repositories;

use Auth\Domain\Contracts\IPersonalAccessToken;
use Auth\Domain\Contracts\IAuth;

interface ITokenRepository
{
    public function findToken(string $token): ?IPersonalAccessToken;

    public function createToken(IAuth $user, string $plain_text_token): IPersonalAccessToken;

    public function removeToken(string $token): void;
}
