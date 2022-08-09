<?php

namespace Mkhab7\MathCaptcha\Traits;

trait Helpers
{
    private function randArray($from, $to, $count = 3): array
    {
        return array_map(fn() => rand($from, $to),
            array_fill(0, $count, null));
    }

}