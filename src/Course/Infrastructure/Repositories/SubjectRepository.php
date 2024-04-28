<?php

declare(strict_types=1);

namespace Course\Infrastructure\Repositories;

use Course\Domain\Contracts\ISubject;
use Course\Domain\Repositories\ISubjectRepository;
use Course\Infrastructure\Models\Subject;
use Shared\Utils\ValueObjects\Uuid;

class SubjectRepository implements ISubjectRepository
{
    public function __construct(
        private readonly Subject $subject
    ) {}

    public function find(Uuid $uuid): ISubject
    {
        /** @var Subject $subject */
        $subject = $this->subject
            ->newQuery()
            ->with('words')
            ->findOrFail($uuid);

        return $subject;
    }

    /** @return ISubject[] */
    public function findCourseSubjects(Uuid $course_id): array
    {
        return $this->subject
            ->newQuery()
            ->where('course_id', $course_id)
            ->get()
            ->all();
    }
}
