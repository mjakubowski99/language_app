<?php

namespace Shared\Utils\Container;

interface IContainer
{
    /**
     * @template T
     *
     * @param string $class
     *
     * @return T
     */
    public function make(string $class): mixed;
}
