<?php

declare(strict_types=1);

namespace Auth\Infrastructure\Repositories;

use Auth\Domain\Contracts\IAuth;
use Auth\Domain\Contracts\IPersonalAccessToken;
use Auth\Domain\Repositories\ITokenRepository;
use Auth\Infrastructure\Models\PersonalAccessToken;
use Carbon\Carbon;

class TokenRepository implements ITokenRepository
{
    public function __construct(
        private readonly PersonalAccessToken $token
    ) {}

    public function findToken(string $token): ?IPersonalAccessToken
    {
        return $this->token::findToken($token);
    }

    public function createToken(IAuth $user, string $plain_text_token): IPersonalAccessToken
    {
        /** @var PersonalAccessToken */
        return $this->token->newQuery()->forceCreate([
            'tokenable_id' => (string) $user->getId(),
            'tokenable_type' => PersonalAccessToken::userTypeToMorph($user->getUserType()),
            'name' => $user->getUniqueIdentity() . "." . Carbon::now()->timestamp,
            'token' => hash('sha256', $plain_text_token),
            'abilities' => ['*'],
            'expires_at' => null,
        ]);
    }

    public function removeToken(string $token): void
    {
        $token = $this->token::findToken($token);
        $token?->delete();
    }
}
