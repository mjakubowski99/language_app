<?php

declare(strict_types=1);

namespace Exercise\Infrastructure\Providers;

use Exercise\Application\Facades\ExerciseFacade;
use Exercise\Domain\Repositories\IQuizRepository;
use Gateways\Exercise\IExerciseFacade;
use Exercise\Infrastructure\Repository\QuizRepository;
use Illuminate\Support\ServiceProvider;

class ExerciseServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(IQuizRepository::class, QuizRepository::class);
        $this->app->bind(IExerciseFacade::class, ExerciseFacade::class);
    }
}
