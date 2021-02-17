# Changelog

All notable changes to `time-helpers` will be documented in this file

## 0.1.0 - 2020-08-21
- initial release


## 0.2.0 - 2020-10-06
- fix composer.json format to allow for dependency upgrades


## 0.3.0 - 2020-10-06
- add support for php 7.0-7.1


## 0.4.0 - 2020-10-08
- fix sfneal/actions min version requirement


## 0.4.1 - 2020-10-09
- cut php 7.0 & 7.1 jobs from Travis CI config


## 0.5.0 - 2020-10-13
- add TimePeriods class for retrieving time period strings


## 0.6.0 - 2020-10-13
- add PeriodTest to test suite (from Spatie\Analytics\Tests\PeriodTest)
- refactor Sfneal\Helpers\Time\TimeConverterService to Sfneal\Helpers\Time\TimeConverter
- refactor Sfneal\Helpers\Time\PeriodService to Sfneal\Helpers\Time\Period


## 0.7.0 - 2020-10-13
- add Duration trait to be used with Eloquent Models for accessing 'duration' attributes


## 0.7.1 - 2020-12-04
- cut support for php7.1 & 7.0
- optimize Travis CI tests


## 0.8.0 - 2020-12-11
- add support for php8


## 0.8.1 - 2020-12-23
- add improved type hinting


## 0.9.0 - 2021-01-21
- add badges to README
- bump sfneal/actions & sfneal/array-helpers min versions to 1.0.0


## 0.9.1 - 2021-01-21
- fix Travis CI config to not include hhvm PHP version


## 0.10.0 - 2021-02-16
- make Carbonate service for adding & subtracting days from a todays Carbon datetime
- fix issue with TimeConverter::setMinutes() method not setting a $seconds property value
- add TimeConvertTest to test suite for testing TimeConverter functionality
- bump phpunit min dev requirement to 8.0 to support use of assertIs{Type} methods


## 0.10.1 - 2021-02-16
- add years, months, yearsAgo, yearsHence, monthsAgo & monthsHence methods to Carbonate with tests


## 1.0.0 - 2021-02-16
- add basic usage instructions to the readme
- optimize CarbonateTest by adding private performAssertions() methods
- initial production release


## 1.0.1 - 2021-02-17
- fix issue with TimeConverter::getHours() unexpectedly including $seconds in the returned string
- add testing infrastructure for testing Duration trait by adding test model, migration & factory with test cases
- bump dev requirement orchestra/testbench min version to 6.7
