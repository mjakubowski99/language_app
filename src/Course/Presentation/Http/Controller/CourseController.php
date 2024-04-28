<?php

declare(strict_types=1);

namespace Course\Presentation\Http\Controller;

use Course\Application\UseCases\GetCourse;
use Course\Application\UseCases\GetCourseList;
use Course\Presentation\Http\Request\GetCourseListRequest;
use Course\Presentation\Http\Resource\CourseDetailResource;
use Course\Presentation\Http\Resource\CourseListResource;
use Shared\Http\Controller\Controller;
use Shared\Http\Request\Request;
use Shared\Utils\ValueObjects\Uuid;

class CourseController extends Controller
{
    public function index(GetCourseListRequest $request, GetCourseList $use_case): CourseListResource
    {
        $result = $use_case->get($request);

        return new CourseListResource($result);
    }

    public function get(Request $request, GetCourse $use_case): CourseDetailResource
    {
        $uuid = Uuid::fromString($request->route('id'));

        $result = $use_case->get($uuid);

        return new CourseDetailResource($result);
    }
}
