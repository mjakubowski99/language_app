<?php

declare(strict_types=1);

namespace User\Infrastructure\Providers;

use Shared\Enum\TokenMorph;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use Shared\User\IUserService;
use User\Domain\Repositories\IUserRepository;
use User\Domain\Services\UserService;
use User\Infrastructure\Models\User;
use User\Infrastructure\Repositories\UserRepository;

class UserServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(IUserService::class, UserService::class);
        $this->app->bind(IUserRepository::class, UserRepository::class);
    }

    public function boot(): void
    {
        Relation::morphMap([
            TokenMorph::USER->value => User::class
        ]);
    }
}
