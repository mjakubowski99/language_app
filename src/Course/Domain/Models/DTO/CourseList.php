<?php

declare(strict_types=1);

namespace Course\Domain\Models\DTO;

use Course\Domain\Contracts\ICourse;
use Course\Domain\Contracts\ICourseList;
use Course\Domain\Contracts\IPaginator;

class CourseList implements ICourseList
{
    public function __construct(
        private readonly array $courses,
        private readonly Paginator $paginator
    ) {}

    /** @return ICourse[] */
    public function getCourses(): array
    {
        return $this->courses;
    }

    public function getPaginator(): IPaginator
    {
        return $this->paginator;
    }
}
