<?php

namespace Sfneal\Helpers\Time\Tests;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Sfneal\Helpers\Time\Carbonate;

class CarbonateTest extends TestCase
{
    /**
     * @var int
     */
    private $year;

    /**
     * @var int
     */
    private $month;

    /**
     * @var int
     */
    private $day;

    /**
     * This method is called before each test.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        // Set random year, month & day
        $this->year = rand(1980, Carbon::today()->year);
        $this->month = rand(1, 12);
        $this->day = rand(1, 28);

        // Change current date for testing purposes
        Carbon::setTestNow(Carbon::create($this->year, $this->month, $this->day));

    }

    /** @test */
    public function it_can_subtract_days()
    {
        $daysAgo = rand(0, $this->day);
        $expected = Carbon::create($this->year, $this->month, $this->day - $daysAgo);
        $output = Carbonate::daysAgo($daysAgo);

        $this->assertInstanceOf(Carbon::class, $output);
        $this->assertEquals($expected, $output);
    }

    /** @test */
    public function it_can_add_days()
    {
        $daysAgo = rand(0, 30);
        $expected = Carbon::create($this->year, $this->month, $this->day + $daysAgo);
        $output = Carbonate::daysHence($daysAgo);

        $this->assertInstanceOf(Carbon::class, $output);
        $this->assertEquals($expected, $output);
    }
}
