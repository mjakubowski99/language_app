<?php

declare(strict_types=1);

namespace Tests\Integration\src\Auth\Presentation\Http\Controller;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Shared\Enum\UserType;
use Student\Infrastructure\Models\Student;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function login_validCredentials_loginWorksWithSanctumMiddleware(): void
    {
        // GIVEN
        $user = Student::factory()->create([
            'password' => Hash::make('password123')
        ]);
        Route::get('/user/test', function(){
            return 1;
        })->middleware('auth:sanctum');

        // WHEN
        $response = $this->json('POST', route('auth.login'), [
            'email' => $user->email,
            'password' => 'password123',
            'device_name' => 'android12',
            'user_type' => UserType::STUDENT->value
        ]);

        $authorized_response = $this->json('GET', '/user/test', [], [
            'Authorization' => 'Bearer ' . $response->json('token')
        ]);

        // THEN
        $response->assertStatus(200);
        $authorized_response->assertStatus(200);
    }
}
