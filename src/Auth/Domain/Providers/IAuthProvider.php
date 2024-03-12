<?php

declare(strict_types=1);

namespace Auth\Domain\Providers;

use Auth\Domain\Contracts\IAuth;
use Shared\Utils\ValueObjects\Uuid;

interface IAuthProvider
{
    public function findById(Uuid $uuid): ?IAuth;

    public function findByUniqueIdentity(string $unique_identity): ?IAuth;
}
