# Access Notion API from you PHP application

[![Latest Version on Packagist](https://img.shields.io/packagist/v/64robots/php-notion.svg?style=flat-square)](https://packagist.org/packages/64robots/php-notion)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/64robots/php-notion/run-tests?label=tests)](https://github.com/64robots/php-notion/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/64robots/php-notion/Check%20&%20fix%20styling?label=code%20style)](https://github.com/64robots/php-notion/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/64robots/php-notion.svg?style=flat-square)](https://packagist.org/packages/64robots/php-notion)

This package allows you to use the Notion API from PHP.

## Installation

This package requires PHP => 7.4.
You can install the package via composer:

```bash
composer require 64robots/php-notion
```

## Usage

You need to create an instance of the `Notion` class using your [Notion Internal Integration Token](https://developers.notion.com/docs/getting-started)

Now you can invoke the resource method you need (`databases` in this example) 

```php
use R64\PhpNotion\Notion;

$notion = new Notion('secret_access_token');

$database = $notion->databases()->retrieve('a65b5216-46cb-479b-961e-67cc7b05a56d');
```
## Resources

### Databases

#### Retrieve a Database
[Notion Retrieve Database documentation](https://developers.notion.com/reference/get-database)
```php
$database = $notion->databases()->retrieve('a65b5216-46cb-479b-961e-67cc7b05a56d');
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
