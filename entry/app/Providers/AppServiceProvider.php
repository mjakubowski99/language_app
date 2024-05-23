<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use Shared\Enum\TokenMorph;
use Student\Infrastructure\Models\Student;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Relation::morphMap([
            TokenMorph::STUDENT->value => Student::class
        ]);
    }
}
