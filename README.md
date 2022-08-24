# math-captcha
A package for generating math captcha
```php
$captcha  = captcha(width: 170, height: 100)->generate()->display();


$answer = $captcha->answer();// 19


$captcha->display();
```
![](https://github.com/mkhab7/math-captcha/blob/main/examples/with-bg.png?raw=true)


```php
captcha()->withoutBgColor()->generate()->display()
```
![](https://github.com/mkhab7/math-captcha/blob/main/examples/without-bg.png?raw=true)


### install via composer : 

```bash 
composer require mkhab7/math-captcha
```
