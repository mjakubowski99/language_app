<?php

namespace Shared\Utils\Config;

use Illuminate\Config\Repository;

class Config implements IConfig
{
    public function __construct(
        private readonly Repository $repository
    ) {}

    public function get(string $key): mixed
    {
        return $this->repository->get($key);
    }
}
