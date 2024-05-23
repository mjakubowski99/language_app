<?php

declare(strict_types=1);

namespace Tests\Integration\src\Course\Domain\Services;

use Course\Domain\Services\WordQuizGenerator;
use Course\Infrastructure\Models\Subject;
use Course\Infrastructure\Models\Word;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class WordQuizGeneratorTest extends TestCase
{
    use DatabaseTransactions;

    private WordQuizGenerator $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = $this->app->make(WordQuizGenerator::class);
    }

    public function test_generateWordQuiz_success(): void
    {
        // GIVEN
        $subject = Subject::factory()->create();
        $words = Word::factory(10)->create();
        $subject->words()->attach($words);

        // WHEN
        $result = $this->service->generateWordQuiz($subject->getId());

        // THEN
        $this->assertDatabaseHas('quizes', [
            'id' => (string) $result->getId()
        ]);
    }
}
