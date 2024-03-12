<?php

declare(strict_types=1);

namespace Auth\Domain\Providers;

use Auth\Domain\Contracts\IAuth;
use Auth\Domain\Models\DTO\Auth;
use Shared\Enum\UserType;
use Shared\Student\IStudent;
use Shared\Student\IStudentProvider;
use Shared\Utils\ValueObjects\Uuid;

class StudentProvider implements IAuthProvider
{
    public function __construct(
        private readonly IStudentProvider $service
    ) {}

    public function findById(Uuid $uuid): ?IAuth
    {
        return $this->toAuth(
            $this->service->findById($uuid)
        );
    }

    public function findByUniqueIdentity(string $unique_identity): ?IAuth
    {
        return $this->toAuth(
            $this->service->findByEmail($unique_identity)
        );
    }

    private function toAuth(?IStudent $student): ?IAuth
    {
        if ($student===null) {
            return null;
        }

        return new Auth(
            $student->getId(),
            $student->getEmail(),
            $student->getPassword(),
            UserType::STUDENT,
        );
    }
}
