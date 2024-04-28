<?php

declare(strict_types=1);

namespace Course\Domain\Contracts;

use Shared\Utils\ValueObjects\Uuid;

interface ISubject
{
    public function getId(): Uuid;

    public function getCourseId(): Uuid;

    public function getDescription(): ?string;

    public function getName(): string;

    /** @return IWord[] */
    public function getWords(): array;
}
