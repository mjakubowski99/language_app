<?php

declare(strict_types=1);

namespace Exercise\Presentation\Http\Resources;

use Exercise\Domain\IQuiz\IQuestionAnswer;
use Exercise\Domain\IQuiz\IQuiz;
use Exercise\Domain\IQuiz\IQuizQuestion;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property IQuiz $resource
 */
class QuizResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->getId(),
            'name' => $this->resource->getName(),
            'questions' => array_map(function (IQuizQuestion $question) {
                return [
                    'id' => $question->getId(),
                    'question' => $question->getQuestion(),
                    'has_multiple_answers' => $question->hasMultipleAnswers(),
                    'answers' => array_map(function (IQuestionAnswer $answer) {
                        return [
                            'id' => $answer->getId(),
                            'answer' => $answer->getAnswer(),
                            'is_valid' => $answer->isValid(),
                        ];
                    }, $question->getAnswers())
                ];
            },$this->resource->getQuestions())
        ];
    }
}
