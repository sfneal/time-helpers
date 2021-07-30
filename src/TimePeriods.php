<?php

namespace Sfneal\Helpers\Time;

class TimePeriods
{
    /**
     * This Month.
     *
     * @param $format string Date format
     * @return array
     */
    public static function thisMonth(string $format = 'Y-m-d'): array
    {
        return self::getPeriod(
            date($format, strtotime('first day of this month')).' 00:00:00',
            date($format, strtotime('last day of this month')).' 23:59:59'
        );
    }

    /**
     * Last Month.
     *
     * @param $format string Date format
     * @return array
     */
    public static function lastMonth(string $format = 'Y-m-d'): array
    {
        return self::getPeriod(
            date($format, strtotime('first day of last month')).' 00:00:00',
            date($format, strtotime('last day of last month')).' 23:59:59'
        );
    }

    /**
     * This Week.
     *
     * @param $format string Date format
     * @return array
     */
    public static function thisWeek(string $format = 'Y-m-d'): array
    {
        return self::getPeriod(
            date($format, strtotime('Monday this week')).' 00:00:00',
            date($format, strtotime('Sunday this week')).' 23:59:59'
        );
    }

    /**
     * Today.
     *
     * @param $format string Date format
     * @return array
     */
    public static function today(string $format = 'Y-m-d'): array
    {
        return self::getPeriod(
            date($format, strtotime('Today')).' 00:00:00',
            date($format, strtotime('Today')).' 23:59:59'
        );
    }

    /**
     * Yesterday.
     *
     * @param $format string Date format
     * @return array
     */
    public static function yesterday(string $format = 'Y-m-d'): array
    {
        return self::getPeriod(
            date($format, strtotime('Yesterday')).' 00:00:00',
            date($format, strtotime('Yesterday')).' 23:59:59'
        );
    }

    /**
     * Tomorrow.
     *
     * @param $format string Date format
     * @return array
     */
    public static function tomorrow(string $format = 'Y-m-d'): array
    {
        return self::getPeriod(
            date($format, strtotime('Tomorrow')).' 00:00:00',
            date($format, strtotime('Tomorrow')).' 23:59:59'
        );
    }

    /**
     * Names of helper methods that don't return time periods.
     */
    private const HELPER_METHODS = ['all', 'get', 'getPeriod', 'mapMethods', 'timePeriod'];

    /**
     * Retrieve an array time period names and time period ranges.
     *
     * @param array $exclusions
     * @return array
     */
    public static function all(array $exclusions = []): array
    {
        // Get all the methods in this class except 'all' & 'getPeriod'
        $methods = array_filter(get_class_methods(new self()), function ($method) use ($exclusions) {
            return ! in_array($method, array_unique(array_merge(self::HELPER_METHODS, $exclusions)));
        });

        // Method name key, with method results values
        return self::mapMethods($methods);
    }

    /**
     * Retrieve an array time period names and time period ranges.
     *
     * @param array $inclusions
     * @return array
     */
    public static function get(...$inclusions): array
    {
        // Get all the methods in this class except 'all' & 'getPeriod'
        $methods = array_filter(get_class_methods(new self()), function ($method) use ($inclusions) {
            return in_array($method, $inclusions);
        });

        // Method name key, with method results values
        return self::mapMethods($methods);
    }

    /**
     * Retrieve a single period range.
     *
     * @param $period
     * @return mixed
     */
    public static function timePeriod($period)
    {
        return self::{$period}();
    }

    /**
     * Return an array of time periods with 'start' and 'end' keys.
     *
     * @param string $start
     * @param string $end
     * @return array
     */
    private static function getPeriod(string $start, string $end): array
    {
        return [$start, $end];
    }

    /**
     * Return method name key, with method results values.
     *
     * @param array $methods
     * @return array
     */
    private static function mapMethods(array $methods): array
    {
        $arr = [];
        foreach ($methods as $method) {
            $arr[$method] = self::{$method}();
        }
        return $arr;
    }
}
