<?php

declare(strict_types=1);

namespace Exercise\Domain\Services;

use Exercise\Domain\Contracts\IQuiz;
use Exercise\Domain\Contracts\IStoreQuizAnswersRequest;
use Exercise\Domain\Repositories\IQuizRepository;
use Gateways\Exercise\Models\QuizWrite;
use Shared\Utils\ValueObjects\Uuid;

class QuizService
{
    public function __construct(
        private readonly IQuizRepository $repository
    ) {}

    public function find(Uuid $uuid): IQuiz
    {
        return $this->repository->find($uuid);
    }

    public function create(QuizWrite $quiz): IQuiz
    {
        return $this->repository->create($quiz);
    }

    public function storeAnswers(IStoreQuizAnswersRequest $request): void
    {
        $correct_answers_ids = $this->repository->getValidAnswerIds($request->getQuizId());

        $answers_count = count($request->getAnswerIds());

        $valid_answers = 0;

        foreach ($request->getAnswerIds() as $answer_id) {
            foreach ($correct_answers_ids as $correct_answers_id) {
                if ($correct_answers_id->getValue() === $answer_id->getValue()) {
                    $valid_answers++;
                }
            }
        }

        $score = $valid_answers / $answers_count;

        $this->repository->storeResult(
            $request->getStudentId(),
            $request->getQuizId(),
            $score
        );
    }
}
