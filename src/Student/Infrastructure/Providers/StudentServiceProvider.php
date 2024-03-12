<?php

declare(strict_types=1);

namespace Student\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Shared\Student\IStudentProvider;
use Student\Application\Shared\StudentProvider;
use Student\Domain\Repositories\IStudentRepository;
use Student\Infrastructure\Repositories\StudentRepository;

class StudentServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(IStudentProvider::class, StudentProvider::class);
        $this->app->bind(IStudentRepository::class, StudentRepository::class);
    }
}
