<?php

declare(strict_types=1);

namespace Course\Domain\Repositories;

use Course\Domain\Contracts\ICourse;
use Shared\Utils\ValueObjects\Uuid;

interface ICourseRepository
{
    /** @return ICourse[] */
    public function get(int $page, int $per_page): array;

    public function find(Uuid $uuid): ?ICourse;
}
