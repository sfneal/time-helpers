<?php

namespace Sfneal\Helpers\Time;

use Carbon\Carbon;
use Sfneal\Actions\AbstractService;

class Carbonate extends AbstractService
{
    // todo: add year, month & week methods

    /**
     * Create a Carbon datetime objects $x days forward/backward in the past or future
     *
     *  - a positive(+) integer $days value correlates to days FORWARD
     *  - a negative(-) integer $days value correlates to days BACKWARD
     *
     * @param int $days
     * @return Carbon
     */
    public static function days(int $days): Carbon
    {
        return ($days < 0) ? self::daysAgo(abs($days)) : self::daysHence($days);
    }

    /**
     * Create a Carbon datetime object representing $x days ago.
     *
     * @param int $daysAgo
     * @return Carbon
     */
    public static function daysAgo(int $daysAgo): Carbon
    {
        return Carbon::now()->subDays($daysAgo);
    }

    /**
     * Create a Carbon datetime object representing $x days from now.
     *
     * @param int $daysFromNow
     * @return Carbon
     */
    public static function daysHence(int $daysFromNow): Carbon
    {
        return Carbon::now()->addDays($daysFromNow);
    }

    /**
     * Create a Carbon datetime objects $x years forward/backward in the past or future
     *
     *  - a positive(+) integer $years value correlates to days FORWARD
     *  - a negative(-) integer $years value correlates to days BACKWARD
     *
     * @param int $years
     * @return Carbon
     */
    public static function years(int $years): Carbon
    {
        return ($years < 0) ? self::yearsAgo(abs($years)) : self::yearsHence($years);
    }

    /**
     * Create a Carbon datetime object representing $x days ago.
     *
     * @param int $yearsAgo
     * @return Carbon
     */
    public static function yearsAgo(int $yearsAgo): Carbon
    {
        return Carbon::now()->subYears($yearsAgo);
    }

    /**
     * Create a Carbon datetime object representing $x days from now.
     *
     * @param int $yearsFromNow
     * @return Carbon
     */
    public static function yearsHence(int $yearsFromNow): Carbon
    {
        return Carbon::now()->addYears($yearsFromNow);
    }

    /**
     * Create a Carbon datetime objects $x months forward/backward in the past or future
     *
     *  - a positive(+) integer $months value correlates to days FORWARD
     *  - a negative(-) integer $months value correlates to days BACKWARD
     *
     * @param int $months
     * @return Carbon
     */
    public static function months(int $months): Carbon
    {
        return ($months < 0) ? self::monthsAgo(abs($months)) : self::monthsHence($months);
    }

    /**
     * Create a Carbon datetime object representing $x months ago.
     *
     * @param int $months
     * @return Carbon
     */
    public static function monthsAgo(int $months): Carbon
    {
        return Carbon::now()->subMonths($months);
    }

    /**
     * Create a Carbon datetime object representing $x months from now.
     *
     * @param int $months
     * @return Carbon
     */
    public static function monthsHence(int $months): Carbon
    {
        return Carbon::now()->addMonths($months);
    }
}
