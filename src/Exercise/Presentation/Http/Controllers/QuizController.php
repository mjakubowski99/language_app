<?php

declare(strict_types=1);

namespace Exercise\Presentation\Http\Controllers;

use App\Http\Controllers\Controller;
use Exercise\Application\UseCases\FindQuiz;
use Exercise\Presentation\Http\Resources\QuizResource;
use Exercise\Presentation\Http\Requests\QuizRequest;

class QuizController extends Controller
{
    public function get(QuizRequest $request, FindQuiz $use_case): QuizResource
    {
        return new QuizResource(
            $use_case->find($request->getId())
        );
    }
}
