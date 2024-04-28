<?php

namespace Course\Domain\Contracts;

use Shared\Utils\ValueObjects\Uuid;

interface IWord
{
    public function getId(): Uuid;

    public function getWord(): string;

    public function getTranslation(): string;
}
