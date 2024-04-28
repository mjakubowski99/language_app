<?php

declare(strict_types=1);

namespace Course\Infrastructure\Models;

use Course\Infrastructure\Factories\TeacherFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasUuids;
    use HasFactory;

    protected $table = 'teachers';

    protected static function newFactory(): Factory
    {
        return new TeacherFactory();
    }
}
