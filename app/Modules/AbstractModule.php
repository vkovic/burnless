<?php

namespace App\Modules;

abstract class AbstractModule
{
    protected $isDbModule = false;
    protected $multiplier = 1;

    abstract public function handle(array $data): void;
}
