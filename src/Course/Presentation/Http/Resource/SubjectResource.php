<?php

declare(strict_types=1);

namespace Course\Presentation\Http\Resource;

use Course\Domain\Contracts\ISubject;
use Course\Domain\Contracts\IWord;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property ISubject $resource
 */
class SubjectResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => (string) $this->resource->getId(),
            'name' => $this->resource->getName(),
            'description' => $this->resource->getDescription(),
            'course_id' => (string) $this->resource->getCourseId(),
            'words' => array_map(fn(IWord $word) => [
                'id' => (string) $word->getId(),
                'word' => $word->getWord(),
                'translation' => $word->getTranslation(),
            ], $this->resource->getWords())
        ];
    }
}
