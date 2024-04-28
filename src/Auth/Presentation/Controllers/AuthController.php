<?php

declare(strict_types=1);

namespace Auth\Presentation\Controllers;

use App\Http\Controllers\Controller;
use Auth\Application\UseCases\LoginUser;
use Auth\Application\UseCases\LogoutUser;
use Auth\Application\UseCases\RefreshLogin;
use Auth\Presentation\Requests\LoginRequest;
use Auth\Presentation\Requests\LogoutRequest;
use Auth\Presentation\Resources\LoginResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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

    public function refreshLogin(Request $request, RefreshLogin $use_case): JsonResponse
    {
        return new JsonResponse([
            'token' => $use_case->refresh($request->bearerToken()??'')
        ]);
    }

    public function logout(LogoutRequest $request, LogoutUser $use_case): JsonResponse
    {
        $use_case->logout($request->getToken());

        return new JsonResponse();
    }
}
