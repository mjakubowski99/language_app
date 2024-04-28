<?php

namespace Exercise\Domain\Contracts;

use Shared\Utils\ValueObjects\Uuid;

interface IQuizAnswer
{
    public function getId(): Uuid;

    public function getOrder(): int;

    public function getAnswer(): string;

    public function isValid(): bool;
}
