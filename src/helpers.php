<?php
if(!function_exists('captcha')){
   function captcha(): \Mkhab7\MathCaptcha\Captcha
   {
       return new \Mkhab7\MathCaptcha\Captcha();
   }

}