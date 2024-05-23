<?php

declare(strict_types=1);

namespace App\Filament\Models;

use App\Filament\Factories\TeacherFactory;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable implements FilamentUser
{
    use HasUuids;
    use HasFactory;

    protected static function newFactory(): TeacherFactory
    {
        return new TeacherFactory();
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }
}
