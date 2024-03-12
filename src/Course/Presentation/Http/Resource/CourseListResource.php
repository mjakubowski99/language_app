<?php

declare(strict_types=1);

namespace Course\Presentation\Http\Resource;

use Course\Domain\Contracts\ICourse;
use Course\Domain\Contracts\ICourseList;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @property ICourseList $resource
 */
class CourseListResource extends AnonymousResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => array_map(fn (ICourse $course) => [
                'id' => $course->getId(),
                'name' => $course->getName(),
                'level' => $course->getLevel(),
                'teacher_id' => $course->getTeacherId(),
            ], $this->resource->getCourses()),
            'page' => $this->resource->getPaginator()->getPage(),
            'per_page' => $this->resource->getPaginator()->getPerPage(),
        ];
    }
}
