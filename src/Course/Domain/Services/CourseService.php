<?php

declare(strict_types=1);

namespace Course\Domain\Services;

use Course\Domain\Contracts\ICourseDetail;
use Course\Domain\Contracts\ICourseList;
use Course\Domain\Contracts\IGetCourseListRequest;
use Course\Domain\Models\DTO\CourseDetail;
use Course\Domain\Models\DTO\CourseList;
use Course\Domain\Models\DTO\Paginator;
use Course\Domain\Repositories\ICourseRepository;
use Course\Domain\Repositories\ISubjectRepository;
use Shared\Utils\ValueObjects\Uuid;

class CourseService
{
    public function __construct(
        private readonly ICourseRepository $repository,
        private readonly ISubjectRepository $subject_repository,
    ) {}

    public function get(IGetCourseListRequest $request): ICourseList
    {
        $results = $this->repository->get($request->getPage(), $request->getPerPage());

        return new CourseList(
            $results,
            new Paginator($request->getPage(), $request->getPerPage())
        );
    }

    public function find(Uuid $uuid): ?ICourseDetail
    {
        $course = $this->repository->find($uuid);

        $subjects = $this->subject_repository->findCourseSubjects($uuid);

        if ($course === null) {
            return null;
        }

        return new CourseDetail(
            $course->getId(),
            $course->getName(),
            $course->getLevel(),
            $subjects,
        );
    }
}
