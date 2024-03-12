<?php

declare(strict_types=1);

namespace Course\Domain\Services;

use Course\Domain\Contracts\ICourseList;
use Course\Domain\Contracts\IGetCourseListRequest;
use Course\Domain\Models\DTO\CourseList;
use Course\Domain\Models\DTO\Paginator;
use Course\Domain\Repositories\ICourseRepository;

class CourseListService
{
    public function __construct(
        private readonly ICourseRepository $repository
    ) {}

    public function get(IGetCourseListRequest $request): ICourseList
    {
        $results = $this->repository->get($request->getPage(), $request->getPerPage());

        return new CourseList(
            $results,
            new Paginator($request->getPage(), $request->getPerPage())
        );
    }
}
