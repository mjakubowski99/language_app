<?php

declare(strict_types=1);

namespace Course\Domain\Models\DTO;

use Course\Domain\Contracts\ICourseDetail;
use Shared\Utils\ValueObjects\Uuid;

class CourseDetail implements ICourseDetail
{
    public function __construct(
        private readonly Uuid $id,
        private readonly string $name,
        private readonly string $level,
        private readonly array $subjects,
    ) {}

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLevel(): string
    {
        return $this->level;
    }

    public function getSubjects(): array
    {
        return $this->subjects;
    }
}
