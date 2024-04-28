<?php

declare(strict_types=1);

namespace Course\Infrastructure\Providers;

use Course\Domain\Repositories\ICourseRepository;
use Course\Domain\Repositories\ISubjectRepository;
use Course\Infrastructure\Repositories\CourseRepository;
use Course\Infrastructure\Repositories\SubjectRepository;
use Illuminate\Support\ServiceProvider;

class CourseServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ICourseRepository::class, CourseRepository::class);
        $this->app->bind(ISubjectRepository::class, SubjectRepository::class);
    }
}
