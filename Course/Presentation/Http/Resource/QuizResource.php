<?php

declare(strict_types=1);

namespace Course\Presentation\Http\Resource;

use Gateways\Exercise\Models\Quiz;
use Gateways\Exercise\Models\QuizAnswer;
use Gateways\Exercise\Models\QuizQuestion;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Quiz $quiz
 */
class QuizResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => (string) $this->resource->getId(),
            'name' => $this->resource->getName(),
            'answer_seconds' => $this->resource->getAnswerSeconds(),
            'questions' => array_map(function (QuizQuestion $question) {
                return [
                    'id' => (string) $question->getId(),
                    'question' => $question->getQuestion(),
                    'has_multiple_answers' => $question->hasMultipleAnswers(),
                    'answers' => array_map(function (QuizAnswer $answer) {
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
