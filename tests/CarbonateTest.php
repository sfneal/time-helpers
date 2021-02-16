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
    public function daysAgo()
    {
        $daysAgo = rand(0, $this->day);
        $expected = Carbon::create($this->year, $this->month, $this->day - $daysAgo);
        $output = Carbonate::daysAgo($daysAgo);

        $this->assertInstanceOf(Carbon::class, $output);
        $this->assertEquals($expected, $output);
    }

    /** @test */
    public function daysHence()
    {
        $daysAgo = rand(0, 30);
        $expected = Carbon::create($this->year, $this->month, $this->day + $daysAgo);
        $output = Carbonate::daysHence($daysAgo);

        $this->assertInstanceOf(Carbon::class, $output);
        $this->assertEquals($expected, $output);
    }

    /** @test */
    public function days_positive()
    {
        $daysAgo = rand(0, 30);
        $expected = Carbon::create($this->year, $this->month, $this->day + $daysAgo);
        $output = Carbonate::days($daysAgo);

        $this->assertInstanceOf(Carbon::class, $output);
        $this->assertEquals($expected, $output);
    }

    /** @test */
    public function days_negative()
    {
        $daysAgo = rand(1, $this->day);
        $expected = Carbon::create($this->year, $this->month, $this->day - $daysAgo);
        $output = Carbonate::days(-$daysAgo);

        $this->assertInstanceOf(Carbon::class, $output);
        $this->assertEquals($expected, $output);
    }

    /** @test */
    public function yearsAgo()
    {
        $daysAgo = rand(0, $this->year);
        $expected = Carbon::create($this->year - $daysAgo, $this->month, $this->day);
        $output = Carbonate::yearsAgo($daysAgo);

        $this->assertInstanceOf(Carbon::class, $output);
        $this->assertEquals($expected, $output);
    }

    /** @test */
    public function yearsHence()
    {
        $daysAgo = rand(0, 30);
        $expected = Carbon::create($this->year + $daysAgo, $this->month, $this->day);
        $output = Carbonate::yearsHence($daysAgo);

        $this->assertInstanceOf(Carbon::class, $output);
        $this->assertEquals($expected, $output);
    }

    /** @test */
    public function years_positive()
    {
        $daysAgo = rand(0, 30);
        $expected = Carbon::create($this->year + $daysAgo, $this->month, $this->day);
        $output = Carbonate::years($daysAgo);

        $this->assertInstanceOf(Carbon::class, $output);
        $this->assertEquals($expected, $output);
    }

    /** @test */
    public function years_negative()
    {
        $daysAgo = rand(1, $this->year);
        $expected = Carbon::create($this->year - $daysAgo, $this->month, $this->day);
        $output = Carbonate::years(-$daysAgo);

        $this->assertInstanceOf(Carbon::class, $output);
        $this->assertEquals($expected, $output);
    }
}
