# Laravel DB dumper

Brings `db:export` and `db:import` artisan commands to Laravel, to easily copy database to another environment.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/hydrat-agency/laravel-db-dumper.svg?style=flat-square)](https://packagist.org/packages/hydrat-agency/laravel-db-dumper)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/hydrat-agency/laravel-db-dumper/run-tests?label=tests)](https://github.com/hydrat-agency/laravel-db-dumper/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/hydrat-agency/laravel-db-dumper/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/hydrat-agency/laravel-db-dumper/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/hydrat-agency/laravel-db-dumper.svg?style=flat-square)](https://packagist.org/packages/hydrat-agency/laravel-db-dumper)

Ever worked with Wordpress and used the WP-Cli ? How handful are `wp db:export` and `wp db:import` commands... 😻  

This package brings the same functionality to Laravel. 

- Export database to a file : 

```bash
❯ php artisan db:export /path/to/file.sql

Exporting database to /path/to/file.sql
Database exported successfully.
```

- Import database from a file : 

```bash
❯ php artisan db:import /path/to/file.sql

Importing database from /path/to/file.sql
Database imported successfully.
```

This package uses [spatie/db-dumper](https://github.com/spatie/db-dumper) in the background to generate db exports.  

## Installation

This package requires php `>= 8.1` and laravel `>= 8.0`.  

You can install the package via composer:  

```bash
composer require hydrat-agency/laravel-db-dumper
```

## Usage

Supported databases :

| Database | Export | Import |
| MySQL | ✅ | ✅ |
| MariaDB | 🅾️ | ✅ |
| PostgreSQL | 🅾️ | 🅾️ |
| SQLite | 🅾️ | ✅ |
| SQL Server | 🅾️ | 🅾️ |

### From artisan CLI

Exporting to a file :  

```bash
php artisan db:export /path/to/file.sql  # full path
php artisan db:export ../dump.sql        # relative path
```

ℹ️ If you don't provide a filename in your path, a name will be automatically generated :  

```bash
❯ php artisan db:export

Exporting database to /path/to/project/dbname_2022-10-05_09-59-48.sql
Database exported successfully.
```

Importing from a file :  

```bash
php artisan db:import /path/to/file.sql  # full path
php artisan db:import ../dump.sql        # relative path
```

### From your code

```php
# Using instance
$dumper = new Hydrat\LaravelDbDumper\LaravelDbDumper();
$dumper->dumpTo('path/to/file.sql', 'dbname');
$dumper->importFrom('path/to/file.sql');

# Using facade
use Hydrat\LaravelDbDumper\Facades\LaravelDbDumper;

LaravelDbDumper::dumpTo('path/to/file.sql', 'dbname');
LaravelDbDumper::importFrom('path/to/file.sql');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Feel free to contribute !

## Security Vulnerabilities

If you find any security vulnerabilities, please don't report it publicly.  
Instead, contact me by private message or at thomas@hydrat.agency.

## Credits

- [Hydrat Agency](https://github.com/Hydrat-Agency)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
