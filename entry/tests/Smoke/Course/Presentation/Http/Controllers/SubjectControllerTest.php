<?php

declare(strict_types=1);

namespace Tests\Smoke\Course\Presentation\Http\Controllers;

use Course\Infrastructure\Models\Subject;
use Course\Infrastructure\Models\Word;
use Tests\TestCase;

class SubjectControllerTest extends TestCase
{
    public function test_get_success(): void
    {
        // GIVEN
        $subject = Subject::factory()->create();
        $subject->words()->attach(Word::factory()->create());

        // WHEN
        $response = $this->json('GET', route('course.subject.get', ['id' => $subject->id]));

        // THEN
        $response->assertOk();
        $response->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'course_id',
                'words' => [
                    [
                        'id',
                        'word',
                        'translation',
                    ]
                ]
            ],
        ]);
    }
}
