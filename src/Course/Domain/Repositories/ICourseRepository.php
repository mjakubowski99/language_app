<?php

declare(strict_types=1);

namespace Course\Domain\Repositories;

use Course\Domain\Contracts\ICourse;

interface ICourseRepository
{
    /** @return ICourse[] */
    public function get(int $page, int $per_page): array;
}
