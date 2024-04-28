<?php

declare(strict_types=1);

namespace Gateways\Exercise;

use Gateways\Exercise\Models\Quiz;
use Gateways\Exercise\Models\QuizWrite;

interface IExerciseFacade
{
    public function createQuiz(QuizWrite $quiz): Quiz;
}
