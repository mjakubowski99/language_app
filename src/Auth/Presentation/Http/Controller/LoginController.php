<?php

declare(strict_types=1);

namespace Auth\Presentation\Http\Controller;

use App\Http\Controllers\Controller;
use Auth\Application\UseCases\LoginUser;
use Auth\Presentation\Http\Request\LoginRequest;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    public function login(LoginRequest $request, LoginUser $use_case): JsonResponse
    {
        $result = $use_case->login($request);

        if (!$result->success()) {
            return new JsonResponse([
                'message' => $result->getFailReason()
            ], 400);
        }

        return new JsonResponse([
            'user' => [
                'id' => (string) $result->getUser()->getId(),
                'email' => $result->getUser()->getEmail()
            ],
            'token' => $result->getToken()
        ]);
    }
}
