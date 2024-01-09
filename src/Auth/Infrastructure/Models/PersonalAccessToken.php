<?php

declare(strict_types=1);

namespace Auth\Infrastructure\Models;

use Auth\Domain\Contracts\IPersonalAccessToken;

class PersonalAccessToken extends \Laravel\Sanctum\PersonalAccessToken implements IPersonalAccessToken
{
    public function getKey(): string
    {
        return (string) parent::getKey();
    }
}
