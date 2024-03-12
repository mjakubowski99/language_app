<?php

declare(strict_types=1);

namespace Student\Domain\Contracts;

use Shared\Utils\ValueObjects\Uuid;

interface IStudent
{
    public function getId(): Uuid;

    public function getEmail(): string;

    public function getPassword(): string;

    public function getUserType(): string;
}
