<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use UseCases\GetUser;

class UserController extends Controller
{
    public function get(GetUser $use_case)
    {
        return $use_case->get(1);
    }
}
