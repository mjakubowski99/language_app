<?php

declare(strict_types=1);

namespace Student\Application\Facades;

use Gateways\Student\IStudentFacade;
use Gateways\Student\Models\Student;
use Shared\Utils\ValueObjects\Uuid;
use Student\Domain\Contracts\IStudent as IDomainStudent;
use Student\Domain\Services\StudentService;

class StudentFacade implements IStudentFacade
{
    public function __construct(
        private readonly StudentService $service
    ) {}

    public function findById(Uuid $uuid): Student
    {
        return $this->mapToDto(
            $this->service->findById($uuid)
        );
    }

    public function findByEmail(string $email): Student
    {
        return $this->mapToDto(
            $this->service->findByEmail($email)
        );
    }

    private function mapToDto(IDomainStudent $student): Student
    {
        return new Student(
            $student->getId(),
            $student->getEmail(),
            $student->getPassword()
        );
    }
}
