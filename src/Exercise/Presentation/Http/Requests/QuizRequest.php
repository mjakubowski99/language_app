<?php

declare(strict_types=1);

namespace Exercise\Presentation\Request;

use Shared\Http\Request\Request;
use Shared\Utils\ValueObjects\Uuid;

class QuizRequest extends Request
{
    public function getId(): Uuid
    {
        return Uuid::fromString($this->route('id'));
    }
}
