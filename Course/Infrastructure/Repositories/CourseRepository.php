<?php

declare(strict_types=1);

namespace Course\Infrastructure\Repositories;

use Course\Domain\Contracts\ICourse;
use Course\Domain\Repositories\ICourseRepository;

use Course\Infrastructure\Models\Course;
use Shared\Utils\ValueObjects\Uuid;

class CourseRepository implements ICourseRepository
{
    public function __construct(
        private readonly Course $course
    ) {}

    public function get(int $page, int $per_page): array
    {
        return $this->course
            ->newQuery()
            ->paginate(perPage: $per_page, page: $page)
            ->items();
    }

    public function find(Uuid $uuid): ?ICourse
    {
        /** @var ICourse */
        return $this->course
            ->newQuery()
            ->find($uuid);
    }
}
