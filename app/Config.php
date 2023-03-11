<?php

namespace LoginApp;

use Illuminate\Support\Arr;

class Config
{

    public bool $sliderMode;
    public bool $blogMode;

    public function __construct($container)
    {
        $env = Arr::get($container, 'dotenv');
    }

    public static function sliderMode()
    {
        return $_ENV['SLIDER_ENABLED'];
    }

    public static function blogMode()
    {
        return $_ENV['BLOG_MODE'];
    }
}