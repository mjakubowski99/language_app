<?php

declare(strict_types=1);

namespace Auth\Infrastructure\Providers;

use Auth\Domain\Repositories\ITokenRepository;
use Auth\Infrastructure\Repositories\TokenRepository;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ITokenRepository::class, TokenRepository::class);
    }
}
