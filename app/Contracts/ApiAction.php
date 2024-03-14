<?php

namespace App\Contracts;

interface ApiAction
{
    public function execute(): array;
}
