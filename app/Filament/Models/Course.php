<?php

declare(strict_types=1);

namespace App\Filament\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasUuids;

    public function subjects(): HasMany
    {
        return $this->hasMany(Subject::class, 'course_id');
    }
}
