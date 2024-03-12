<?php

declare(strict_types=1);

namespace Exercise\Presentation\Http\Controller;

use App\Http\Controllers\Controller;
use Exercise\Application\UseCases\FindQuiz;
use Exercise\Presentation\Http\Resources\QuizResource;
use Exercise\Presentation\Request\QuizRequest;

class QuizController extends Controller
{
    public function get(QuizRequest $request, FindQuiz $use_case): QuizResource
    {
        return new QuizResource(
            $use_case->find($request->getId())
        );
    }
}

