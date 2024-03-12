<?php

declare(strict_types=1);

namespace Course\Presentation\Http\Controller;

use Course\Application\UseCases\GetCourseList;
use Course\Presentation\Http\Request\GetCourseListRequest;
use Course\Presentation\Http\Resource\CourseListResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Shared\Http\Controller\Controller;

class CourseController extends Controller
{
    public function get(GetCourseListRequest $request, GetCourseList $use_case): AnonymousResourceCollection
    {
        $result = $use_case->get($request);

        return CourseListResource::collection($result);
    }
}
