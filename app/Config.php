<?php

namespace LoginApp;

use Illuminate\Support\Arr;

class Config {

    public bool $testMode;
    public bool $sliderMode;

    public function __construct($container) {
        $env = Arr::get($container, 'dotenv');
    }

    public static function sliderMode() {
        return filter_var($_ENV['SLIDER_ENABLED'], FILTER_VALIDATE_BOOLEAN);
    }

    public static function galleryMode() {
        return filter_var($_ENV['GALLERY_ENABLED'], FILTER_VALIDATE_BOOLEAN);
    }

    public static function testMode() {
        return filter_var($_ENV['TEST_MODE'], FILTER_VALIDATE_BOOLEAN);
    }

    public static function blogMode() {
        return filter_var($_ENV['BLOG_MODE'], FILTER_VALIDATE_BOOLEAN);
    }
}