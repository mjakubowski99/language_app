<?php

declare(strict_types=1);

namespace Auth\Domain\Models\Enum;

enum FailReason: string
{
    case USER_NOT_FOUND = 'User not found';
}
