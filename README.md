# 🗄️ NIDA for Laravel

Unofficial package for fetching users information based on National ID Number for Laravel applications.

<br>

## Features 🔎

- [x] Fetch user information based on National ID Number
- [ ] Save user information to database (migration and model)
- [ ] Add command to fetch user information
- [ ] Add helper function to fetch user information
- [ ] Add cache to fetch user information
- [ ] add tests


> **Note:** User Image and Signature are currently not supported (Depreciated !!)

<!--
# This is my package laravel-nida

[![Latest Version on Packagist](https://img.shields.io/packagist/v/alphaolomi/laravel-nida.svg?style=flat-square)](https://packagist.org/packages/alphaolomi/laravel-nida)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/alphaolomi/laravel-nida/run-tests?label=tests)](https://github.com/alphaolomi/laravel-nida/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/alphaolomi/laravel-nida/Check%20&%20fix%20styling?label=code%20style)](https://github.com/alphaolomi/laravel-nida/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/alphaolomi/laravel-nida.svg?style=flat-square)](https://packagist.org/packages/alphaolomi/laravel-nida)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.
 -->

## 📦 Prerequisites 

- PHP 8.x or higher
- Laravel 8 or above
- Composer
<!-- - Database (if using DB features) () -->

## ⬇️ Installation

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

## 🔎  Usage

To fetch user information based on ID Number, you can use the following method:

### 1. Using Facades

```php
use Alphaolomi\LaravelNida\Facades\Nida;

$userData = Nida::getUserData('XXXXXXXXXXXXXXXXXXXX');

echo $userData;
```

### 2. Using static classes

```php
$nida = new Alphaolomi\Nida();
echo $nida->getUserData('XXXXXXXXXXXXXXXXXXXX');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

##  Issues

Are you facing any issue with usage of the package, just [raise an issue]() and I looking to fixing it as soon as I can.

## 🤝 Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## 🔐 Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## 👏 Credits

-   [Alpha Olomi](https://github.com/alphaolomi)
-   [All Contributors](../../contributors)

## 📝 License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Support | Give it a star 🌟

Did you find this repository useful to you ? Well then give it a star so as more people can get to know about it;

## Disclaimers

> This is not an official package. It not endorsed by any organization or individual. Authors are not responsible for any misinformation or misuse of the package of any kind. Author is not responsible for any misuse of the package.
