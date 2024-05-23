<?php

declare(strict_types=1);

namespace Exercise\Application\Mappers;

use Exercise\Domain\Contracts\IQuiz;
use Exercise\Domain\Contracts\IQuizAnswer;
use Exercise\Domain\Contracts\IQuizQuestion;
use Gateways\Exercise\Models\Quiz;
use Gateways\Exercise\Models\QuizAnswer;
use Gateways\Exercise\Models\QuizQuestion;

final class QuizMapper
{
    public function mapQuiz(IQuiz $quiz): Quiz
    {
        return new Quiz(
            $quiz->getId(),
            $quiz->getName(),
            $quiz->getAnswerSeconds(),
            array_map(function (IQuizQuestion $question) {
                return new QuizQuestion(
                    $question->getId(),
                    $question->getQuestion(),
                    $question->hasMultipleAnswers(),
                    array_map(function (IQuizAnswer $answer) {
                        return new QuizAnswer(
                            $answer->getId(),
                            $answer->getOrder(),
                            $answer->getAnswer(),
                            $answer->isValid(),
                        );
                    }, $question->getAnswers())
                );
            }, $quiz->getQuestions())
        );
    }
}
