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

        $this->assertThisMonth($start, $end);
    }

    /** @test */
    public function lastMonth()
    {
        [$start, $end] = TimePeriods::lastMonth();

        $this->assertLastMonth($start, $end);
    }

    /** @test */
    public function thisWeek()
    {
        [$start, $end] = TimePeriods::thisWeek();

        $this->assertThisWeek($start, $end);
    }

    /** @test */
    public function today()
    {
        [$start, $end] = TimePeriods::today();

        $this->assertToday($start, $end);
    }

    /** @test */
    public function yesterday()
    {
        [$start, $end] = TimePeriods::yesterday();

        $this->assertYesterday($start, $end);
    }

    /** @test */
    public function tomorrow()
    {
        [$start, $end] = TimePeriods::tomorrow();

        $this->assertTomorrow($start, $end);
    }


    /**
     * Assert the $start & $end datetime strings make up a 'ThisMonth' time period.
     *
     * @param $start
     * @param $end
     */
    public function assertThisMonth($start, $end)
    {
        $targetStart = date('Y-m-d', strtotime('first day of this month')).' 00:00:00';
        $targetEnd = date('Y-m-d', strtotime('last day of this month')).' 23:59:59';

        $this->assertNotNull($start);
        $this->assertNotNull($end);
        $this->assertIsString($start);
        $this->assertIsString($end);
        $this->assertEquals($targetStart, $start);
        $this->assertEquals($targetEnd, $end);
    }

    /**
     * Assert the $start & $end datetime strings make up a 'LastMonth' time period.
     *
     * @param $start
     * @param $end
     */
    public function assertLastMonth($start, $end)
    {
        $targetStart = date('Y-m-d', strtotime('first day of last month')).' 00:00:00';
        $targetEnd = date('Y-m-d', strtotime('last day of last month')).' 23:59:59';

        $this->assertNotNull($start);
        $this->assertNotNull($end);
        $this->assertIsString($start);
        $this->assertIsString($end);
        $this->assertEquals($targetStart, $start);
        $this->assertEquals($targetEnd, $end);
    }

    /**
     * Assert the $start & $end datetime strings make up a 'ThisWeek' time period.
     *
     * @param $start
     * @param $end
     */
    public function assertThisWeek($start, $end)
    {
        $targetStart = date('Y-m-d', strtotime('Monday this week')).' 00:00:00';
        $targetEnd = date('Y-m-d', strtotime('Sunday this week')).' 23:59:59';

        $this->assertNotNull($start);
        $this->assertNotNull($end);
        $this->assertIsString($start);
        $this->assertIsString($end);
        $this->assertEquals($targetStart, $start);
        $this->assertEquals($targetEnd, $end);
    }

    /**
     * Assert the $start & $end datetime strings make up a 'Today' time period.
     *
     * @param $start
     * @param $end
     */
    public function assertToday($start, $end)
    {
        $targetStart = date('Y-m-d', strtotime('Today')).' 00:00:00';
        $targetEnd = date('Y-m-d', strtotime('Today')).' 23:59:59';

        $this->assertNotNull($start);
        $this->assertNotNull($end);
        $this->assertIsString($start);
        $this->assertIsString($end);
        $this->assertEquals($targetStart, $start);
        $this->assertEquals($targetEnd, $end);
    }

    /**
     * Assert the $start & $end datetime strings make up a 'Yesterday' time period.
     *
     * @param $start
     * @param $end
     */
    public function assertYesterday($start, $end)
    {
        $targetStart = date('Y-m-d', strtotime('Yesterday')).' 00:00:00';
        $targetEnd = date('Y-m-d', strtotime('Yesterday')).' 23:59:59';

        $this->assertNotNull($start);
        $this->assertNotNull($end);
        $this->assertIsString($start);
        $this->assertIsString($end);
        $this->assertEquals($targetStart, $start);
        $this->assertEquals($targetEnd, $end);
    }

    /**
     * Assert the $start & $end datetime strings make up a 'Tomorrow' time period.
     *
     * @param $start
     * @param $end
     */
    public function assertTomorrow($start, $end)
    {
        $targetStart = date('Y-m-d', strtotime('Tomorrow')).' 00:00:00';
        $targetEnd = date('Y-m-d', strtotime('Tomorrow')).' 23:59:59';

        $this->assertNotNull($start);
        $this->assertNotNull($end);
        $this->assertIsString($start);
        $this->assertIsString($end);
        $this->assertEquals($targetStart, $start);
        $this->assertEquals($targetEnd, $end);
    }
}
