# Laravel Benchmark

Provide benchmark for artisan command.

### Installation

Install wia composer:

```
composer require yk/laravel-benchmark
```

And add the service provider in config/app.php:

```php
Yk\LaravelBenchmark\LaravelBenchmarkProvider::class,
```

### How to use

To calculate benchmark speeds for an artisan command:

```
php artisan benchmark command_name
```

You can easy save test results by redirecting the output to file, example:

```
php artisan benchmark command_name >> test.txt
```

## Note

You can perform benchmarks only for commands without parameters

## TODO

1. Add support for commands with parameters
2. Change performance values calculation by providing the average of multiple test.

## License

### GPLv2

Copyright (c) 2016 Yassine Khachlek <yassine.khachlek@gmail.com>

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.