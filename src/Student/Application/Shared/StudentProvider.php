<?php

declare(strict_types=1);

namespace Student\Application\Shared;

use Shared\Student\IStudent;
use Student\Domain\Contracts\IStudent as IDomainStudent;
use Shared\Student\IStudentProvider;
use Shared\Utils\ValueObjects\Uuid;
use Student\Domain\Services\StudentService;

class StudentProvider implements IStudentProvider
{
    public function __construct(
        private readonly StudentService $service
    ) {}

    public function findById(Uuid $uuid): ?IStudent
    {
        return $this->mapToDto(
            $this->service->findById($uuid)
        );
    }

    public function findByEmail(string $email): ?IStudent
    {
        return $this->mapToDto(
            $this->service->findByEmail($email)
        );
    }

    private function mapToDto(IDomainStudent $student): IStudent
    {
        return new Student(
            $student->getId(),
            $student->getEmail(),
            $student->getPassword()
        );
    }
}
