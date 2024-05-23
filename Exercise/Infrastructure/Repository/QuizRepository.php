<?php

declare(strict_types=1);

namespace Exercise\Infrastructure\Repository;

use Exercise\Domain\Contracts\IQuiz;
use Exercise\Domain\Repositories\IQuizRepository;
use Exercise\Infrastructure\Entities\Quiz;
use Exercise\Infrastructure\Entities\QuizAnswer;
use Exercise\Infrastructure\Entities\QuizQuestion;
use Gateways\Exercise\Models\QuizWrite;
use Shared\Utils\ValueObjects\Uuid;

class QuizRepository implements IQuizRepository
{
    public function __construct(
        private readonly Quiz $quiz,
        private readonly QuizQuestion $quiz_question,
        private readonly QuizAnswer $quiz_answer,
    ) {}

    public function find(Uuid $quiz_id): IQuiz
    {
        /** @var IQuiz */
        return $this->quiz
            ->newQuery()
            ->with('questions.answers')
            ->findOrFail($quiz_id);
    }

    public function create(QuizWrite $quiz): IQuiz
    {
        $quiz_model = $this->quiz->newQuery()->create([
            'id' => (string) Uuid::make(),
            'name' => $quiz->getName(),
            'answer_seconds' => $quiz->getAnswerSeconds(),
        ]);

        foreach ($quiz->getQuestions() as $question) {
            $question_model = $this->quiz_question->newQuery()->create([
                'id' => (string) Uuid::make(),
                'quiz_id' => $quiz_model->id,
                'question' => $question->getQuestion(),
            ]);

            foreach ($question->getAnswers() as $answer) {
                $this->quiz_answer->newQuery()->create([
                    'id' => (string) Uuid::make(),
                    'quiz_question_id' => $question_model->id,
                    'order' => $answer->getOrder(),
                    'answer' => $answer->getAnswer(),
                    'is_valid' => $answer->isValid(),
                ]);
            }
        }

        return $this->find(Uuid::fromString($quiz_model->id));
    }

    public function getValidAnswerIds(Uuid $quiz_id): array
    {
        return $this->quiz_answer
            ->newQuery()
            ->where('quiz_id', (string) $quiz_id)
            ->where('is_valid', true)
            ->select('id')
            ->get()
            ->map(fn(QuizAnswer $answer) => $answer->getId());
    }

    public function storeResult(Uuid $student_id, Uuid $quiz_id, float $score)
    {
        // TODO: Implement storeResult() method.
    }
}
