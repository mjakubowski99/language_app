<?php

declare(strict_types=1);

namespace Course\Infrastructure\Factories;

use Course\Infrastructure\Models\Word;
use Illuminate\Database\Eloquent\Factories\Factory;

class WordFactory extends Factory
{
    protected $model = Word::class;

    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'word' => $this->faker->word,
            'translation' => $this->faker->word,
        ];
    }
}
