<?php

declare(strict_types=1);

namespace Exercise\Domain\Contracts;

use Shared\Utils\ValueObjects\Uuid;

interface IQuestionAnswer
{
    public function getId(): Uuid;

    public function getOrder(): int;

    public function getAnswer(): string;

    public function isValid(): bool;
}
