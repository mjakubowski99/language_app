<?php

declare(strict_types=1);

namespace Auth\Infrastructure\Repositories;

use Auth\Domain\Contracts\IPersonalAccessToken;
use Auth\Domain\Repositories\ITokenRepository;
use Carbon\Carbon;
use Auth\Infrastructure\Models\PersonalAccessToken;
use Shared\User\IUser;

class TokenRepository implements ITokenRepository
{
    public function __construct(
        private readonly PersonalAccessToken $token
    ) {}

    public function createToken(IUser $user, string $plain_text_token): IPersonalAccessToken
    {
        $token = $this->token->newQuery()->forceCreate([
            'tokenable_id' => (string) $user->getId(),
            'tokenable_type' => $user->getModelName(),
            'name' => $user->getEmail() . "." . Carbon::now()->timestamp,
            'token' => hash('sha256', $plain_text_token),
            'abilities' => ['*'],
            'expires_at' => null,
        ]);

        return $token;

        return $token->getKey().'|'.$plainTextToken;
    }

    public function removeToken(string $token): void
    {
        $token = $this->token::findToken($token);
        $token->delete();
    }
}
