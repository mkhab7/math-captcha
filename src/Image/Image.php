<?php

namespace Mkhab7\MathCaptcha\Image;

use Mkhab7\MathCaptcha\Font\Font;
use Mkhab7\MathCaptcha\Traits\Helpers;

class Image
{
    use Helpers;

    protected $image;

    public array $bgColor;

    public ?Font $font;

    /**
     * @throws \Exception
     */
    public function __construct(public int $width = 170,
                                public int $height = 100,
                                ?array     $fonts = null)
    {

        $this->font = new Font($fonts);


        $this->checkRequirements();


        $this->image = imagecreatetruecolor($width, $height);
        $this->bgColor = ['0', $this->randArray(40, 255)];
    }

    public function write($text, $size, $angle, $x, $y): static
    {
        imagettftext($this->image, $size, $angle, $x, $y, $this->randomColor(), $this->font->random(), $text);
        return $this;
    }

    /**
     * @return \GdImage|bool
     */
    public function getImage(): \GdImage|bool
    {
        return $this->image;
    }


    public function applyBackgroundColor(): self
    {
        for ($i = 0; $i < $this->width; $i++) {
            for ($j = 0; $j < $this->height; $j++) {
                $bg = $this->bgColor[array_rand($this->bgColor)];
                if ($bg == 0) {
                    $color = imagecolorallocatealpha($this->image, $bg, $bg, $bg, rand(100, 127));
                } else {
                    $color = imagecolorallocatealpha($this->image, $bg[0], $bg[1], $bg[2], rand(100, 127));
                }
                imagesetpixel($this->image, $i, $j, $color);
            }
        }
        return $this;
    }

    private function randomColor(): bool|int
    {
        $rgb = $this->randArray(90, 200);
        return imagecolorallocatealpha($this->image, $rgb[0], $rgb[1], $rgb[2], 5);
    }

    /**
     * @throws \Exception
     */
    private function checkRequirements(): void
    {
        if (!extension_loaded('GD'))
            throw new \Exception("GD library is disable ! ");
    }


}