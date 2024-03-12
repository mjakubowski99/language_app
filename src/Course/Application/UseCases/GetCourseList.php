<?php

declare(strict_types=1);

namespace Course\Application\UseCases;

use Course\Domain\Contracts\ICourseList;
use Course\Domain\Contracts\IGetCourseListRequest;
use Course\Domain\Services\CourseListService;

class GetCourseList
{
    public function __construct(
        private readonly CourseListService $service
    ) {}

    public function get(IGetCourseListRequest $request): ICourseList
    {
        return $this->service->get($request);
    }
}
