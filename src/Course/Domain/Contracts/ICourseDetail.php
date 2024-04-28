<?php

declare(strict_types=1);

namespace Course\Domain\Contracts;

use Shared\Utils\ValueObjects\Uuid;

interface ICourseDetail
{
    public function getId(): Uuid;

    public function getName(): string;

    public function getLevel(): string;

    /** @return ISubject[] */
    public function getSubjects(): array;
}
