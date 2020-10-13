<?php

namespace Sfneal\Helpers\Time\Tests;

use PHPUnit\Framework\TestCase;
use Sfneal\Helpers\Time\TimePeriods;

class TimePeriodsTest extends TestCase
{
    /** @test */
    public function timeThisMonth()
    {
        $period = TimePeriods::thisMonth();
        $this->assertTrue(is_array($period));
    }

    /** @test */
    public function timeLastMonth()
    {
        $period = TimePeriods::lastMonth();
        $this->assertTrue(is_array($period));
    }

    /** @test */
    public function timeThisWeek()
    {
        $period = TimePeriods::thisWeek();
        $this->assertTrue(is_array($period));
    }

    /** @test */
    public function timeToday()
    {
        $period = TimePeriods::today();
        $this->assertTrue(is_array($period));
    }
}
