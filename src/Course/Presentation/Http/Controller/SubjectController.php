<?php

declare(strict_types=1);

namespace Course\Presentation\Http\Controller;

use Course\Application\UseCases\GenerateWordQuiz;
use Course\Application\UseCases\GetSubjectDetails;
use Course\Presentation\Http\Resource\QuizResource;
use Course\Presentation\Http\Resource\SubjectResource;
use Shared\Http\Controller\Controller;
use Shared\Http\Request\Request;
use Shared\Utils\ValueObjects\Uuid;

class SubjectController extends Controller
{
    public function get(Request $request, GetSubjectDetails $use_case): SubjectResource
    {
        $uuid = Uuid::fromString($request->route('id'));

        return new SubjectResource($use_case->get($uuid));
    }

    public function generateQuiz(Request $request, GenerateWordQuiz $use_case): QuizResource
    {
        $uuid = Uuid::fromString($request->route('id'));

        $quiz = $use_case->generate($uuid);

        return new QuizResource($quiz);
    }
}
