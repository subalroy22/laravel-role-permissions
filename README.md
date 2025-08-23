# A Laravel package to manage roles and permissions for users with middleware, Blade directives, and caching support.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/subalroy22/laravel-role-permissions.svg?style=flat-square)](https://packagist.org/packages/subalroy22/laravel-role-permissions)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/subalroy22/laravel-role-permissions/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/subalroy22/laravel-role-permissions/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/subalroy22/laravel-role-permissions/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/subalroy22/laravel-role-permissions/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/subalroy22/laravel-role-permissions.svg?style=flat-square)](https://packagist.org/packages/subalroy22/laravel-role-permissions)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/laravel-role-permissions.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/laravel-role-permissions)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require subalroy22/laravel-role-permissions
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-role-permissions-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-role-permissions-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-role-permissions-views"
```

## Usage

```php
$laravelRolePermissions = new Subalroy22\LaravelRolePermissions();
echo $laravelRolePermissions->echoPhrase('Hello, Subalroy22!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Subol Roy](https://github.com/subalroy22)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
