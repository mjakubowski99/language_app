<?php

declare(strict_types=1);

namespace Auth\Domain\Contracts;

use Shared\Enum\UserType;
use Shared\Utils\ValueObjects\Uuid;

interface IAuth
{
    public function getId(): Uuid;

    public function getUniqueIdentity(): string;

    public function getPassword(): string;

    public function getUserType(): UserType;
}
