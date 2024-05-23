<?php

declare(strict_types=1);

namespace Course\Domain\Contracts;

interface IPaginator
{
    public function getPage(): int;

    public function getPerPage(): int;
}
