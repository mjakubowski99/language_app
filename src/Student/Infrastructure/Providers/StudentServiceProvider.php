<?php

declare(strict_types=1);

namespace Student\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Student\Application\Facades\StudentFacade;
use Student\Domain\Repositories\IStudentRepository;
use Student\Infrastructure\Repositories\StudentRepository;
use Gateways\Student\IStudentFacade;

class StudentServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(IStudentFacade::class, StudentFacade::class);
        $this->app->bind(IStudentRepository::class, StudentRepository::class);
    }
}
