<?php

declare(strict_types=1);

namespace Course\Domain\Contracts;

interface IGetCourseListRequest
{
    public function getSearchKeyword(): ?string;

    public function getPage(): int;

    public function getPerPage(): int;
}
