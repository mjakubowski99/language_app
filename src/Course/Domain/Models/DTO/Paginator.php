<?php

declare(strict_types=1);

namespace Course\Domain\Models\DTO;

use Course\Domain\Contracts\IPaginator;

class Paginator implements IPaginator
{
    public function __construct(
        private readonly int $page,
        private readonly int $per_page
    ) {}

    public function getPage(): int
    {
        return $this->page;
    }

    public function getPerPage(): int
    {
        return $this->per_page;
    }
}
