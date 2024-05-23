<?php

declare(strict_types=1);

namespace Student\Infrastructure\Providers;

use Gateways\Student\IStudentFacade;
use Illuminate\Support\ServiceProvider;
use Student\Application\Facades\StudentFacade;
use Student\Domain\Repositories\IStudentRepository;
use Student\Infrastructure\Repositories\StudentRepository;

class StudentServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(IStudentFacade::class, StudentFacade::class);
        $this->app->bind(IStudentRepository::class, StudentRepository::class);
    }
}
