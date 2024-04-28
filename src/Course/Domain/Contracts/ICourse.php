<?php

declare(strict_types=1);

namespace Course\Domain\Contracts;

use Shared\Utils\ValueObjects\Uuid;

interface ICourse
{
    public function getId(): Uuid;

    public function getName(): string;

    public function getLevel(): string;

    public function getTeacherId(): Uuid;
}
