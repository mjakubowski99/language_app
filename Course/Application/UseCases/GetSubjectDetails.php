<?php

declare(strict_types=1);

namespace Course\Application\UseCases;

use Course\Domain\Contracts\ISubject;
use Course\Domain\Services\SubjectService;
use Shared\Utils\ValueObjects\Uuid;

class GetSubjectDetails
{
    public function __construct(
        private readonly SubjectService $service
    ) {}

    public function get(Uuid $uuid): ISubject
    {
        return $this->service->get($uuid);
    }
}
