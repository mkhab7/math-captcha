<?php
if(!function_exists('captcha')){
   function captcha($width = 170, $height = 100): \Mkhab7\MathCaptcha\Captcha
   {
       return new \Mkhab7\MathCaptcha\Captcha( $width, $height);
   }

}