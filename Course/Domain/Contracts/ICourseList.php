<?php

declare(strict_types=1);

namespace Course\Domain\Contracts;

interface ICourseList
{
    /** @return ICourse[] */
    public function getCourses(): array;

    public function getPaginator(): IPaginator;
}
