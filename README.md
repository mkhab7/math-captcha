# math-captcha
A package for generating math captcha
```php
$captcha  = captcha()->generate()->display();
$answer = $captcha->answer();
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
