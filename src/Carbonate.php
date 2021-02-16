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
}
