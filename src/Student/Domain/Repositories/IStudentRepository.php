<?php

declare(strict_types=1);

namespace Student\Domain\Repositories;

use Shared\Utils\ValueObjects\Uuid;
use Student\Domain\Contracts\IStudent;

interface IStudentRepository
{
    public function find(Uuid $user_id): ?IStudent;

    public function findByEmail(string $email): ?IStudent;
}
