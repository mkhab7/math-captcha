<?php

namespace Mkhab7\MathCaptcha;


use Mkhab7\MathCaptcha\Image\Image;
use Mkhab7\MathCaptcha\Response\Response;
use Mkhab7\MathCaptcha\Traits\Helpers;

class Captcha
{
    use Helpers;


    protected Image $image;

    private array $operators = ['+', '-'];

    private bool $unsigned = true;


    public function __construct()
    {
        $this->image = new Image();

    }

    /**
     * @return Response
     */
    public function generate(): Response
    {
        $width = $this->image->width;
        $height = $this->image->height;

        $size = $this->randArray(round($width / 6), round($width / 5.15), 4);
        $angle = $this->randArray(0, 15, 4);
        $y = $this->randArray(
            round($height / 2 + ($height / 10)),
            round($height / 2 + ($height / 9)),
            2);

        extract($this->makeQuestion());


        $this->image
            ->applyBackgroundColor()
            ->write($numbers[0], $size[0], $angle[0], round($width / 34.2), $y[0])
            ->write($operator, $size[1], $angle[1], round($width / 3.7), round($height / 1.42))
            ->write($numbers[1], $size[2], $angle[2], round($width / 2.26), $y[1])
            ->write("= ?", $size[3], $angle[3], round($width / 1.45), round($height / 1.42));

        return new Response($this->image, $operator, $numbers);
    }

    /**
     * @return array
     */
    private function makeQuestion(): array
    {

        do {

            $operator = $this->operators[array_rand($this->operators)];
            $numbers = $this->randArray(1, 15, 2);

        } while ($this->unsigned &&
        $operator == '-' &&
        !$this->isUnsigned($numbers));

        return compact('numbers', 'operator');
    }

    /**
     * @param bool $unsigned
     * @return Captcha
     */
    public function setUnsigned(bool $unsigned): self
    {
        $this->unsigned = $unsigned;
        return $this;
    }

    public function isUnsigned($numbers): bool
    {
        return ($numbers[0] - $numbers[1]) > 0;
    }
}