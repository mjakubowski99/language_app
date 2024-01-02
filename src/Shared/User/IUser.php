<?php

declare(strict_types=1);

namespace Shared\User;

use Shared\Utils\ValueObjects\Uuid;

interface IUser
{
    public function getId(): Uuid;

    public function getEmail(): string;

    public function getPassword(): string;

    public function getModelName(): string;
}
