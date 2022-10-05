# Brings db:export/db:import command to laravel for easier environment propagation

[![Latest Version on Packagist](https://img.shields.io/packagist/v/hydrat-agency/laravel-db-dumper.svg?style=flat-square)](https://packagist.org/packages/hydrat-agency/laravel-db-dumper)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/hydrat-agency/laravel-db-dumper/run-tests?label=tests)](https://github.com/hydrat-agency/laravel-db-dumper/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/hydrat-agency/laravel-db-dumper/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/hydrat-agency/laravel-db-dumper/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/hydrat-agency/laravel-db-dumper.svg?style=flat-square)](https://packagist.org/packages/hydrat-agency/laravel-db-dumper)

Ever worked with Wordpress and used the WP-Cli ? How handful are `wp db:export` and `wp db:import` commands... 😻  
This package brings the same functionality to Laravel. 

Export database (with a full or relative path) : 

```bash
❯ php artisan db:export /path/to/file.sql

Exporting database to /path/to/file.sql
Database exported successfully.
```

Import database from a file : 

```bash
❯ php artisan db:import /path/to/file.sql

Importing database from /path/to/file.sql
Database imported successfully.
```

## Installation

This package requires php `>= 8.1` and laravel `>= 8.0`.  
It uses [spatie/db-dumper](https://github.com/spatie/db-dumper) in the background to generate db exports.  


You can install the package via composer:  

```bash
composer require hydrat-agency/laravel-db-dumper
```

## Usage

### From artisan CLI

Exporting to a file :  

```bash
php artisan db:export /path/to/file.sql  # full
php artisan db:export ../dump.sql        # relative
```

If no file path is specified, a name will be automatically generated :  

```bash
❯ art db:export

Exporting database to /path/to/project/dbname_2022-10-05_09-59-48.sql
Database exported successfully.
```

Importing from a file :  

```bash
php artisan db:import /path/to/file.sql  # full
```

### From your code

Using the class :  

```php
$laravelDbDumper = new Hydrat\LaravelDbDumper\LaravelDbDumper();

$laravelDbDumper->dumpTo('path/to/file.sql', 'dbname');
$laravelDbDumper->importFrom('path/to/file.sql');
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

If you find any security vulnerabilities, don't report it publicly. Instead, please contact me by private message.

## Credits

- [Hydrat Agency](https://github.com/Hydrat-Agency)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
