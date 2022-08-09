<?php

namespace Mkhab7\MathCaptcha\Response;

use Mkhab7\MathCaptcha\Image\Image;

class Response
{
    private int $answer;


    public function __construct(protected Image $image,
        protected string $operator,
        protected array $numbers)
    {
        $this->answer = $this->calculate();

    }

    private function calculate(): mixed
    {
        return match ($this->operator) {
            '+' => $this->numbers[0] + $this->numbers[1],
            '-' => $this->numbers[0] - $this->numbers[1]
        };
    }

    /**
     * @return int
     */
    public function answer(): int
    {
        return $this->answer;
    }

    public function save($path): self
    {
        imagepng($this->image->getImage(),$path);
        return $this;
    }

    public function display(): self
    {
        header("Content-type: image/png");
        imagepng($this->image->getImage());
        return $this;
    }


}