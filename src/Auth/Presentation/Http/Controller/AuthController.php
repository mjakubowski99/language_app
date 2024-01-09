<?php

declare(strict_types=1);

namespace Auth\Presentation\Http\Controller;

use App\Http\Controllers\Controller;
use Auth\Application\UseCases\LoginUser;
use Auth\Application\UseCases\LogoutUser;
use Auth\Presentation\Http\Request\LoginRequest;
use Auth\Presentation\Http\Request\LogoutRequest;
use Auth\Presentation\Http\Resources\LoginResponse;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function login(LoginRequest $request, LoginUser $use_case): LoginResponse|JsonResponse
    {
        $result = $use_case->login($request);

        if (!$result->success()) {
            return new JsonResponse([
                'message' => $result->getFailReason()
            ], 400);
        }
        return new LoginResponse($result);
    }

    public function logout(LogoutRequest $request, LogoutUser $use_case): JsonResponse
    {
        $use_case->logout($request->getToken());

        return new JsonResponse();
    }
}
