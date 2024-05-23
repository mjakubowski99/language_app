<?php

declare(strict_types=1);

namespace Course\Infrastructure\Factories;

use Course\Infrastructure\Models\Course;
use Course\Infrastructure\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{
    protected $model = Subject::class;

    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'name' => $this->faker->name,
            'course_id' => Course::factory()->create()->id,
        ];
    }
}
