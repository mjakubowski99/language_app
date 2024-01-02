<?php

declare(strict_types=1);

namespace Auth\Infrastructure\Repositories;

use Auth\Domain\Repositories\ITokenRepository;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Laravel\Sanctum\PersonalAccessToken;
use Shared\User\IUser;

class TokenRepository implements ITokenRepository
{
    public function __construct(
        private readonly PersonalAccessToken $token
    ) {}

    public function createToken(IUser $user): string
    {
        $plainTextToken = $this->generateTokenString();

        $token = $this->token->newQuery()->forceCreate([
            'tokenable_id' => (string) $user->getId(),
            'tokenable_type' => $user->getModelName(),
            'name' => $user->getEmail() . "." . Carbon::now()->timestamp,
            'token' => hash('sha256', $plainTextToken),
            'abilities' => ['*'],
            'expires_at' => null,
        ]);

        return $token->getKey().'|'.$plainTextToken;
    }

    private function generateTokenString(): string
    {
        return sprintf(
            '%s%s%s',
            config('sanctum.token_prefix', ''),
            $tokenEntropy = Str::random(40),
            hash('crc32b', $tokenEntropy)
        );
    }
}
