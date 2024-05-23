<?php

declare(strict_types=1);

namespace Gateways\Student;

use Gateways\Student\Models\Student;
use Shared\Utils\ValueObjects\Uuid;

interface IStudentFacade
{
    public function findById(Uuid $uuid): ?Student;

    public function findByEmail(string $email): ?Student;
}
