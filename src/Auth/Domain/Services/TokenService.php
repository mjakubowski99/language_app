<?php

declare(strict_types=1);

namespace Auth\Domain\Services;

use Auth\Domain\Contracts\IAuth;
use Auth\Domain\Factories\AuthProviderFactory;
use Auth\Domain\Repositories\ITokenRepository;
use Shared\Utils\Config\IConfig;
use Shared\Utils\Str\IStr;

class TokenService
{
    public function __construct(
        private readonly IConfig $config,
        private readonly IStr $string,
        private readonly ITokenRepository $repository,
        private readonly AuthProviderFactory $factory,
    ) {}

    public function createToken(IAuth $user): string
    {
        $plain_text_token = $this->generateTokenString();

        $token = $this->repository->createToken($user, $plain_text_token);

        return $token->getKey() . '|' . $plain_text_token;
    }

    public function removeToken(string $token): void
    {
        $this->repository->removeToken($token);
    }

    public function refreshToken(string $token): string
    {
        $token = $this->repository->findToken($token);

        if ($token === null) {
            throw new \Exception();
        }

        if ($token->getRefreshExpiresAt()->gte(now())) {
            throw new \Exception();
        }

        $provider = $this->factory->make($token->getUserType());

        $user = $provider->findById($token->getTokenableId());

        return $this->createToken($user);
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
