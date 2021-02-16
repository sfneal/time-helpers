<?php

namespace Sfneal\Helpers\Time;

use Carbon\Carbon;
use Sfneal\Actions\AbstractService;

class Carbonate extends AbstractService
{
    // todo: add year, month & week methods
    // todo: add methods that accept positives or negative ints to determine sub or add

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
