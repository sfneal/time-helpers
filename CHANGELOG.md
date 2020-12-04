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
