<?php

declare(strict_types=1);

namespace Auth\Presentation\Http\Request;

use Auth\Domain\Contracts\ILoginRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Shared\Enum\UserType;

class LoginRequest extends FormRequest implements ILoginRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
            'device_name' => ['required', 'string'],
            'user_type' => ['required', 'string', Rule::in([UserType::STUDENT->value])],
        ];
    }

    public function getEmail(): string
    {
        return $this->input('email');
    }

    public function getUserPassword(): string
    {
        return $this->input('password');
    }

    public function getDeviceName(): string
    {
        return $this->input('device_name');
    }

    public function getUserType(): UserType
    {
        return UserType::from($this->input('user_type'));
    }
}
