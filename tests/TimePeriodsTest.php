<?php

namespace Sfneal\Helpers\Time\Tests;

use PHPUnit\Framework\TestCase;
use Sfneal\Helpers\Time\TimePeriods;

class TimePeriodsTest extends TestCase
{
    /** @test */
    public function timeThisMonth()
    {
        list($start, $end) = TimePeriods::thisMonth();

        $targetStart = date('Y-m-d', strtotime('first day of this month')).' 00:00:00';
        $targetEnd = date('Y-m-d', strtotime('last day of this month')).' 23:59:59';

        $this->assertTrue($start == $targetStart);
        $this->assertTrue($end == $targetEnd);
    }

    /** @test */
    public function timeLastMonth()
    {
        list($start, $end) = TimePeriods::lastMonth();

        $targetStart = date('Y-m-d', strtotime('first day of last month')).' 00:00:00';
        $targetEnd = date('Y-m-d', strtotime('last day of last month')).' 23:59:59';

        $this->assertTrue($start == $targetStart);
        $this->assertTrue($end == $targetEnd);
    }

    /** @test */
    public function timeThisWeek()
    {
        list($start, $end) = TimePeriods::thisWeek();

        $targetStart = date('Y-m-d', strtotime('Monday this week')).' 00:00:00';
        $targetEnd = date('Y-m-d', strtotime('Sunday this week')).' 23:59:59';

        $this->assertTrue($start == $targetStart);
        $this->assertTrue($end == $targetEnd);
    }

    /** @test */
    public function today()
    {
        list($start, $end) = TimePeriods::today();

        $targetStart = date('Y-m-d', strtotime('Today')).' 00:00:00';
        $targetEnd = date('Y-m-d', strtotime('Today')).' 23:59:59';

        $this->assertTrue($start == $targetStart);
        $this->assertTrue($end == $targetEnd);
    }

    /** @test */
    public function yesterday()
    {
        list($start, $end) = TimePeriods::yesterday();

        $targetStart = date('Y-m-d', strtotime('Yesterday')).' 00:00:00';
        $targetEnd = date('Y-m-d', strtotime('Yesterday')).' 23:59:59';

        $this->assertTrue($start == $targetStart);
        $this->assertTrue($end == $targetEnd);
    }

    /** @test */
    public function tomorrow()
    {
        list($start, $end) = TimePeriods::tomorrow();

        $targetStart = date('Y-m-d', strtotime('Tomorrow')).' 00:00:00';
        $targetEnd = date('Y-m-d', strtotime('Tomorrow')).' 23:59:59';

        $this->assertTrue($start == $targetStart);
        $this->assertTrue($end == $targetEnd);
    }
}
