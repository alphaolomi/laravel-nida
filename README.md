
# 🗄️ NIDA for Laravel [![Latest Version on Packagist](https://img.shields.io/packagist/v/alphaolomi/laravel-nida?style=flat-square)](https://packagist.org/packages/alphaolomi/laravel-nida) [![run-tests](https://github.com/alphaolomi/laravel-nida/actions/workflows/run-tests.yml/badge.svg)](https://github.com/alphaolomi/laravel-nida/actions/workflows/run-tests.yml) [![Total Downloads](https://img.shields.io/packagist/dt/alphaolomi/laravel-nida.svg?style=flat-square)](https://packagist.org/packages/alphaolomi/laravel-nida) [![Maintained](https://img.shields.io/badge/Maintained-Yes-brightgreen.svg)](#)

Unofficial package for fetching users information based on National ID Number for Laravel applications.

<br>

## Features 🔎

- [x] Fetch user information based on National ID Number
- [ ] Save user information to database (migration and model)
- [ ] Add command to fetch user information
- [ ] Add helper function to fetch user information
- [ ] Add cache to fetch user information
- [ ] Add tests


> **Note:** User Image and Signature are currently not supported (Depreciated !!)

<!--
# This is my package laravel-nida



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.
 -->
<br>

## 📦  Prerequisites 

- PHP 8.0 or higher
- Laravel 8 or above
- Composer
<!-- - Database (if using DB features) () -->

<br>

## ⬇️  Installation

You can install the package via [composer](https://getcomposer.org/):

```bash
composer require alphaolomi/laravel-nida
```

<!--
You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-nida-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-nida-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-nida-views"
``` -->

<br>



## 🔎  Usage

To fetch user information based on ID Number, you can use the following method:

### 1. Using Facades

```php
use Alphaolomi\Nida\Facades\Nida;

$userData = Nida::getUserData('XXXXXXXXXXXXXXXXXXXX');

echo $userData;
```

### 2. Using static classes

```php
use Alphaolomi\Nida\Nida;

$nida = new Nida();
echo $nida->getUserData('XXXXXXXXXXXXXXXXXXXX');
```

## Testing

```bash
composer test
```

<br>

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

<br>

##  Issues

Are you facing any issue with usage of the package, just [raise an issue](https://github.com/alphaolomi/laravel-nida/issues/new) and I looking to fixing it as soon as I can.

<br>

## 🤝 Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

<br>

## 🔐 Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

<br>

## 👏 Credits

-   [Alpha Olomi](https://github.com/alphaolomi)
-   [All Contributors](../../contributors)
<br>

## 📝 License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

<br>

## 🌟 Support | Give it a star 

Did you find this repository useful to you ? Give it a star so as more people can get to know about it;

<br>

## ❕ Disclaimers

> This is not an official package. It not endorsed by any organization or individual. Authors are not responsible for any misinformation or misuse of the package of any kind. Author is not responsible for any damages caused by use of the package.
