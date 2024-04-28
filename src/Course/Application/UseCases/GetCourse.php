<?php

declare(strict_types=1);

namespace Course\Application\UseCases;

use Course\Domain\Contracts\ICourseDetail;
use Course\Domain\Services\CourseService;
use Shared\Utils\ValueObjects\Uuid;

class GetCourse
{
    public function __construct(
        private readonly CourseService $service
    ) {}

    public function get(Uuid $uuid): ICourseDetail
    {
        return $this->service->find($uuid);
    }
}
