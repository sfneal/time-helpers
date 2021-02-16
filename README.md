# Time Helpers

[![Packagist PHP support](https://img.shields.io/packagist/php-v/sfneal/time-helpers)](https://packagist.org/packages/sfneal/time-helpers)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/sfneal/time-helpers.svg?style=flat-square)](https://packagist.org/packages/sfneal/time-helpers)
[![Build Status](https://travis-ci.com/sfneal/time-helpers.svg?branch=master&style=flat-square)](https://travis-ci.com/sfneal/time-helpers)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/sfneal/time-helpers/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/sfneal/time-helpers/?branch=master)
[![StyleCI](https://github.styleci.io/repos/289328954/shield?branch=master)](https://github.styleci.io/repos/289328954?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/sfneal/time-helpers.svg?style=flat-square)](https://packagist.org/packages/sfneal/time-helpers)

PHP time utilities for converting time values & creating time periods

## Installation

You can install the package via composer:

```bash
composer require sfneal/time-helpers
```

## Usage

### Carbonate
Carbonate can be used to retrieve Carbon objects transformed from today's datetime.  This is useful for getting a Carbon
object that represents a datetime in the past or future.

``` php
use Sfneal\Helpers\Time\Carbonate;

// Retrieve a Carbon\Carbon object representing '3' days ago
$threeDaysAgo = Carbonate::daysAgo(3);
$threeDaysAgo = Carbonate::days(-3);

// Retrieve a Carbon\Carbon object representing '5' years ago
$fiveYearsAgo = Carbonate::yearsAgo(3);
$fiveYearsAgo = Carbonate::years(-3);

// Retrieve a Carbon\Carbon object representing '6' months ago
$sixMonthsAgo = Carbonate::monthsAgo(3);
$sixMonthsAgo = Carbonate::months(-3);
```

### TimeConverter
TimeConverter is used to convert between different units of time (hours, minutes & seconds).  

``` php
use Sfneal\Helpers\Time\TimeConverter;

// Convert Hours to Minutes
$hours = 5.5;
$minutes = (new TimeConverter())->setHours($hours)->minutes();
>>> 19800


// Convert Seconds to Hours
$seconds = 37800;
$hours = (new TimeConverter())->setSeconds($hours)->hours();
>>> 10.5
```


### TimePeriod
TimePeriod is used to retrieve a start & end datetime for a period of time (like today, last month, etc).  This can be
useful when creating time scoped queries, like collecting all the orders from last month.

``` php
use Sfneal\Helpers\Time\TimePeriod;

// Retrieve a TimePeriod representing today (02/16/2021)
[$start, $end] = TimePeriods::today();
// $start >>> 2021-02-16 00:00:00
// $end >>> 2021-02-16 23:59:59
```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email stephen.neal14@gmail.com instead of using the issue tracker.

## Credits

- [Stephen Neal](https://github.com/sfneal)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## PHP Package Boilerplate

This package was generated using the [PHP Package Boilerplate](https://laravelpackageboilerplate.com).
