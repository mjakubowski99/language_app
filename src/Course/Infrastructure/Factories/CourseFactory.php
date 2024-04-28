<?php

declare(strict_types=1);

namespace Course\Infrastructure\Factories;

use Course\Infrastructure\Models\Course;
use Course\Infrastructure\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'name' => $this->faker->name,
            'level' => $this->faker->word,
            'teacher_id' => Teacher::factory()->create()->id,
        ];
    }
}
