<?php

declare(strict_types=1);

namespace Course\Infrastructure\Models;

use Course\Domain\Contracts\ICourse;
use Course\Infrastructure\Factories\CourseFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Shared\Utils\ValueObjects\Uuid;

class Course extends Model implements ICourse
{
    use HasUuids, HasFactory;

    protected $table = 'courses';

    protected $guarded = [];

    protected static function newFactory(): Factory
    {
        return new CourseFactory();
    }

    public function getId(): Uuid
    {
        return Uuid::fromString($this->id);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLevel(): string
    {
        return $this->level;
    }

    public function getTeacherId(): Uuid
    {
        return Uuid::fromString($this->teacher_id);
    }
}
