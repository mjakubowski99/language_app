<?php

declare(strict_types=1);

namespace Auth\Domain\Factories;

use Auth\Domain\Providers\IAuthProvider;
use Auth\Domain\Providers\StudentProvider;
use Shared\Enum\UserType;
use Shared\Utils\Container\IContainer;

class AuthProviderFactory
{
    public function __construct(
        private readonly IContainer $container
    ) {}

    public function make(UserType $type): IAuthProvider
    {
        switch ($type) {
            case UserType::STUDENT:
                return $this->container->make(StudentProvider::class);
        }
        throw new \Exception();
    }
}
