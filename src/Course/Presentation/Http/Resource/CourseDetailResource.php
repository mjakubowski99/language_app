<?php

declare(strict_types=1);

namespace Course\Presentation\Http\Resource;

use Course\Domain\Contracts\ICourseDetail;
use Course\Domain\Contracts\ISubject;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property ICourseDetail $resource
 */
class CourseDetailResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => (string) $this->resource->getId(),
            'name' => $this->resource->getName(),
            'level' => $this->resource->getLevel(),
            'subjects' => array_map(fn(ISubject $subject) => [
                'id' => (string) $subject->getId(),
                'name' => $subject->getName(),
            ], $this->resource->getSubjects())
        ];
    }
}
