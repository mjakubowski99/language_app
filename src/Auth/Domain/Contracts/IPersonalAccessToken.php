<?php

declare(strict_types=1);

namespace Auth\Domain\Contracts;

interface IPersonalAccessToken
{
    public function getKey(): string;
}
