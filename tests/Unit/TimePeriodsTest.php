<?php

namespace Sfneal\Helpers\Time\Tests\Unit;

use Sfneal\Helpers\Time\Tests\TestCase;
use Sfneal\Helpers\Time\TimePeriods;

class TimePeriodsTest extends TestCase
{
    /**
     * @var bool
     */
    protected $seed = false;

    /** @test */
    public function thisMonth()
    {
        [$start, $end] = TimePeriods::thisMonth();

        $targetStart = date('Y-m-d', strtotime('first day of this month')).' 00:00:00';
        $targetEnd = date('Y-m-d', strtotime('last day of this month')).' 23:59:59';

        $this->assertEquals($targetStart, $start);
        $this->assertEquals($targetEnd, $end);
    }

    /** @test */
    public function lastMonth()
    {
        [$start, $end] = TimePeriods::lastMonth();

        $targetStart = date('Y-m-d', strtotime('first day of last month')).' 00:00:00';
        $targetEnd = date('Y-m-d', strtotime('last day of last month')).' 23:59:59';

        $this->assertEquals($targetStart, $start);
        $this->assertEquals($targetEnd, $end);
    }

    /** @test */
    public function thisWeek()
    {
        [$start, $end] = TimePeriods::thisWeek();

        $targetStart = date('Y-m-d', strtotime('Monday this week')).' 00:00:00';
        $targetEnd = date('Y-m-d', strtotime('Sunday this week')).' 23:59:59';

        $this->assertEquals($targetStart, $start);
        $this->assertEquals($targetEnd, $end);
    }

    /** @test */
    public function today()
    {
        [$start, $end] = TimePeriods::today();

        $targetStart = date('Y-m-d', strtotime('Today')).' 00:00:00';
        $targetEnd = date('Y-m-d', strtotime('Today')).' 23:59:59';

        $this->assertEquals($targetStart, $start);
        $this->assertEquals($targetEnd, $end);
    }

    /** @test */
    public function yesterday()
    {
        [$start, $end] = TimePeriods::yesterday();

        $targetStart = date('Y-m-d', strtotime('Yesterday')).' 00:00:00';
        $targetEnd = date('Y-m-d', strtotime('Yesterday')).' 23:59:59';

        $this->assertEquals($targetStart, $start);
        $this->assertEquals($targetEnd, $end);
    }

    /** @test */
    public function tomorrow()
    {
        [$start, $end] = TimePeriods::tomorrow();

        $targetStart = date('Y-m-d', strtotime('Tomorrow')).' 00:00:00';
        $targetEnd = date('Y-m-d', strtotime('Tomorrow')).' 23:59:59';

        $this->assertEquals($targetStart, $start);
        $this->assertEquals($targetEnd, $end);
    }
}
