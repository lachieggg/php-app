<?php

namespace LoginApp;

use Illuminate\Support\Arr;

class Config
{
    public function __construct($container)
    {
        $env = Arr::get($container, 'dotenv');
    }
}