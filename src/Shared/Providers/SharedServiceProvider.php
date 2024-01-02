<?php

declare(strict_types=1);

namespace Shared\Providers;

use Illuminate\Support\ServiceProvider;
use Shared\Utils\Hash\Hash;
use Shared\Utils\Hash\IHash;
use Shared\Utils\Storage\IStorage;
use Shared\Utils\Storage\Storage;

class SharedServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(IHash::class, Hash::class);
        $this->app->bind(IStorage::class, Storage::class);
    }
}
