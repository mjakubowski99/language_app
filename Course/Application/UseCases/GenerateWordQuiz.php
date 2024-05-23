<?php

namespace Course\Application\UseCases;

use Course\Domain\Services\SubjectService;
use Gateways\Exercise\Models\Quiz;
use Shared\Utils\ValueObjects\Uuid;

class GenerateWordQuiz
{
    public function __construct(
        private readonly SubjectService $service
    ) {}

    public function generate(Uuid $subject_id): Quiz
    {
        return $this->service->generateWordQuiz($subject_id);
    }
}
