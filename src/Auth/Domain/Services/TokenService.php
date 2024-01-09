<?php

declare(strict_types=1);

namespace Auth\Domain\Services;

use Auth\Domain\Repositories\ITokenRepository;
use Illuminate\Support\Str;
use Shared\User\IUser;
use Shared\Utils\Config\IConfig;
use Shared\Utils\Str\IStr;

class TokenService
{
    public function __construct(
        private readonly IConfig $config,
        private readonly IStr $string,
        private readonly ITokenRepository $repository
    ) {}

    public function createToken(IUser $user): string
    {
        $plain_text_token = $this->generateTokenString();

        $token = $this->repository->createToken($user, $plain_text_token);

        return $token->getKey() . '|' . $plain_text_token;
    }

    public function removeToken(string $token): void
    {
        $this->repository->removeToken($token);
    }

    private function generateTokenString(): string
    {
        return sprintf(
            '%s%s%s',
            $this->config->get('sanctum.token_prefix') ?? '',
            $tokenEntropy = $this->string->random(40),
            hash('crc32b', $tokenEntropy)
        );
    }
}
