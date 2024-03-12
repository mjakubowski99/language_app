<?php

declare(strict_types=1);

namespace Student\Infrastructure\Repositories;

use Shared\Utils\ValueObjects\Uuid;
use Student\Domain\Repositories\IStudentRepository;
use Student\Infrastructure\Models\Student;
use Student\Domain\Contracts\IStudent;

class StudentRepository implements IStudentRepository
{
    public function __construct(
        private readonly Student $user
    ) {}

    public function find(Uuid $user_id): ?IStudent
    {
        /** @var ?IStudent */
        return $this->user->newQuery()
            ->where('id', (string) $user_id)
            ->first();
    }

    public function findByEmail(string $email): ?IStudent
    {
        /** @var ?IStudent */
        return $this->user->newQuery()
            ->where('email', $email)
            ->first();
    }
}
