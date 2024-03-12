<?php

declare(strict_types=1);

namespace Shared\Student;

use Shared\Utils\ValueObjects\Uuid;

interface IStudent
{
    public function getId(): Uuid;

    public function getEmail(): string;

    public function getPassword(): string;
}
