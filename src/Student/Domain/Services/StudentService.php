<?php

declare(strict_types=1);

namespace Student\Domain\Services;

use Student\Domain\Contracts\IStudent;
use Shared\Utils\ValueObjects\Uuid;
use Student\Domain\Repositories\IStudentRepository;

class StudentService
{
    public function __construct(
        private readonly IStudentRepository $repository
    ) {}

    public function findById(Uuid $uuid): ?IStudent
    {
        return $this->repository->find($uuid);
    }

    public function findByEmail(string $email): ?IStudent
    {
        return $this->repository->findByEmail($email);
    }
}
