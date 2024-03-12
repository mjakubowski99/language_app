<?php

declare(strict_types=1);

namespace Tests\Smoke\Auth\Presentation\Http\Controllers;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;
use Shared\Enum\UserType;
use Tests\TestCase;
use Student\Infrastructure\Models\Student;

class LoginControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function test_login_WhenValidCredentials_success(): void
    {
        $student = Student::factory()->create([
            'email' => 'email@email.com',
            'password' => Hash::make('secret123'),
        ]);

        $response = $this
            ->postJson(route('auth.login'), [
                'email' => $student->email,
                'password' => 'secret123',
                'device_name' => 'android',
                'user_type' => UserType::STUDENT->value
            ]);

        $response->assertOk();
    }
}
