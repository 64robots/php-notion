# Package to use Notion API from PHP

[![Latest Version on Packagist](https://img.shields.io/packagist/v/64robots/php_notion.svg?style=flat-square)](https://packagist.org/packages/64robots/php_notion)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/64robots/php_notion/run-tests?label=tests)](https://github.com/64robots/php_notion/actions?query=workflow%3ATests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/64robots/php_notion/Check%20&%20fix%20styling?label=code%20style)](https://github.com/64robots/php_notion/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/64robots/php_notion.svg?style=flat-square)](https://packagist.org/packages/64robots/php_notion)

This is a package to use Notion from PHP.

## Installation

You can install the package via composer:

```bash
composer require 64robots/php-notion
```

## Usage

```php
$phpNotion = new R64\PhpNotion();
echo $phpNotion->echoPhrase('Hello, Notion!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [64 Robots](https://github.com/64robots)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
