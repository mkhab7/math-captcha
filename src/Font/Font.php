<?php

namespace Mkhab7\MathCaptcha\Font;

class Font
{

    public function __construct(
        public array $fonts = [__DIR__.'/../../fonts/3dumb.ttf'])
    {
    }


    public function random()
    {
        return $this->fonts[array_rand($this->fonts)];
    }

}