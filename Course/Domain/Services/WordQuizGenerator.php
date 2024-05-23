<?php

namespace Course\Domain\Services;

use Course\Domain\Repositories\ISubjectRepository;
use Gateways\Exercise\IExerciseFacade;
use Gateways\Exercise\Models\Quiz;
use Gateways\Exercise\Models\QuizAnswerWrite;
use Gateways\Exercise\Models\QuizQuestionWrite;
use Gateways\Exercise\Models\QuizWrite;
use Shared\Utils\ValueObjects\Uuid;

class WordQuizGenerator
{
    public function __construct(
        private readonly ISubjectRepository $repository,
        private readonly IExerciseFacade $exercise_facade
    ) {}

    public function generateWordQuiz(Uuid $subject_id): Quiz
    {
        $subject = $this->repository->find($subject_id);
        $words = $subject->getWords();
        shuffle($words);

        $questions_count = ceil(count($words) * 0.60);
        $questions = [];

        for ($i = 0; $i < $questions_count; $i++) {
            $selected_keys = array_rand($words, 4);
            $correct_key = $selected_keys[0];
            $correct_word = $words[$correct_key];

            $question = $correct_word->getTranslation();
            $correct_answer = $correct_word->getWord();
            $incorrect_answers = [];

            foreach ($selected_keys as $key) {
                if ($key != $correct_key) {
                    $incorrect_answers[] = $words[$key]->getWord();
                }
            }

            $answers = [
                new QuizAnswerWrite(0, $correct_answer, true)
            ];
            foreach ($incorrect_answers as $incorrect_answer) {
                $answers[] = new QuizAnswerWrite(1, $incorrect_answer, false);
            }
            shuffle($answers);

            $questions[] = new QuizQuestionWrite($question, $answers);
        }

        $quiz_write = new QuizWrite("Word quiz", $questions, 15);
        return $this->exercise_facade->createQuiz($quiz_write);
    }
}
