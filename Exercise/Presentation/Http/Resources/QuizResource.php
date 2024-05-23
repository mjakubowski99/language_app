<?php

declare(strict_types=1);

namespace Exercise\Presentation\Http\Resources;

use Exercise\Domain\Contracts\IQuiz;
use Exercise\Domain\Contracts\IQuizAnswer;
use Exercise\Domain\Contracts\IQuizQuestion;
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
            'id' => (string) $this->resource->getId(),
            'name' => $this->resource->getName(),
            'answer_seconds' => $this->resource->getAnswerSeconds(),
            'questions' => array_map(function (IQuizQuestion $question) {
                return [
                    'id' => (string) $question->getId(),
                    'question' => $question->getQuestion(),
                    'has_multiple_answers' => $question->hasMultipleAnswers(),
                    'answers' => array_map(function (IQuizAnswer $answer) {
                        return [
                            'id' => (string) $answer->getId(),
                            'answer' => $answer->getAnswer(),
                            'is_valid' => $answer->isValid(),
                        ];
                    }, $question->getAnswers())
                ];
            },$this->resource->getQuestions())
        ];
    }
}
