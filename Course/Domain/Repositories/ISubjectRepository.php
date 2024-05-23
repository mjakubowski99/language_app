<?php

declare(strict_types=1);

namespace Course\Domain\Repositories;

use Course\Domain\Contracts\ISubject;
use Shared\Utils\ValueObjects\Uuid;

interface ISubjectRepository
{
    public function find(Uuid $uuid): ISubject;

    /** @return ISubject[] */
    public function findCourseSubjects(Uuid $course_id): array;
}
