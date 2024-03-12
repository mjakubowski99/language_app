<?php

declare(strict_types=1);

namespace Shared\Student;

use Shared\Utils\ValueObjects\Uuid;

interface IStudentProvider
{
    public function findById(Uuid $uuid): ?IStudent;

    public function findByEmail(string $email): ?IStudent;
}
