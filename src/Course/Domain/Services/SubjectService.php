<?php

declare(strict_types=1);

namespace Course\Domain\Services;

use Course\Domain\Contracts\ISubject;
use Course\Domain\Repositories\ISubjectRepository;
use Gateways\Exercise\Models\Quiz;
use Shared\Utils\ValueObjects\Uuid;

class SubjectService
{
    public function __construct(
        private readonly ISubjectRepository $repository,
        private readonly WordQuizGenerator $generator,
    ) {}

    public function get(Uuid $subject_id): ISubject
    {
      return $this->repository->find($subject_id);
    }

    public function generateWordQuiz(Uuid $subject_id): Quiz
    {
        return $this->generator->generateWordQuiz($subject_id);
    }
}
