<?php

declare(strict_types=1);

namespace Auth\Presentation\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogoutRequest extends FormRequest
{
    public function getToken(): string
    {
        return $this->bearerToken();
    }
}
