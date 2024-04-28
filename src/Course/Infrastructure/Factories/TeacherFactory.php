<?php

namespace Course\Infrastructure\Factories;

use Course\Infrastructure\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class TeacherFactory extends Factory
{
    protected $model = Teacher::class;

    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => Hash::make('secret'),
        ];
    }
}
