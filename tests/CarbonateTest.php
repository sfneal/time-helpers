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

    /**
     * Perform the necessary assertions.
     *
     * @param Carbon $expected
     * @param Carbon $output
     * @return void
     */
    private function performAssertions(Carbon $expected, Carbon $output): void
    {
        $this->assertInstanceOf(Carbon::class, $output);
        $this->assertEquals($expected, $output);
    }

    /** @test */
    public function daysAgo()
    {
        $daysAgo = rand(0, $this->day);
        $expected = Carbon::create($this->year, $this->month, $this->day - $daysAgo);
        $output = Carbonate::daysAgo($daysAgo);

        $this->performAssertions($expected, $output);
    }

    /** @test */
    public function daysHence()
    {
        $daysAgo = rand(0, 30);
        $expected = Carbon::create($this->year, $this->month, $this->day + $daysAgo);
        $output = Carbonate::daysHence($daysAgo);

        $this->performAssertions($expected, $output);
    }

    /** @test */
    public function days_positive()
    {
        $daysAgo = rand(0, 30);
        $expected = Carbon::create($this->year, $this->month, $this->day + $daysAgo);
        $output = Carbonate::days($daysAgo);

        $this->performAssertions($expected, $output);
    }

    /** @test */
    public function days_negative()
    {
        $daysAgo = rand(1, $this->day);
        $expected = Carbon::create($this->year, $this->month, $this->day - $daysAgo);
        $output = Carbonate::days(-$daysAgo);

        $this->performAssertions($expected, $output);
    }

    /** @test */
    public function yearsAgo()
    {
        $yearsAgo = rand(0, $this->year);
        $expected = Carbon::create($this->year - $yearsAgo, $this->month, $this->day);
        $output = Carbonate::yearsAgo($yearsAgo);

        $this->performAssertions($expected, $output);
    }

    /** @test */
    public function yearsHence()
    {
        $yearsAgo = rand(0, 30);
        $expected = Carbon::create($this->year + $yearsAgo, $this->month, $this->day);
        $output = Carbonate::yearsHence($yearsAgo);

        $this->performAssertions($expected, $output);
    }

    /** @test */
    public function years_positive()
    {
        $yearsAgo = rand(0, 30);
        $expected = Carbon::create($this->year + $yearsAgo, $this->month, $this->day);
        $output = Carbonate::years($yearsAgo);

        $this->performAssertions($expected, $output);
    }

    /** @test */
    public function years_negative()
    {
        $yearsAgo = rand(1, $this->year);
        $expected = Carbon::create($this->year - $yearsAgo, $this->month, $this->day);
        $output = Carbonate::years(-$yearsAgo);

        $this->performAssertions($expected, $output);
    }

    /** @test */
    public function monthsAgo()
    {
        $monthsAgo = rand(0, $this->month);
        $expected = Carbon::create($this->year, $this->month - $monthsAgo, $this->day);
        $output = Carbonate::monthsAgo($monthsAgo);

        $this->performAssertions($expected, $output);
    }

    /** @test */
    public function monthsHence()
    {
        $monthsAgo = rand(0, 30);
        $expected = Carbon::create($this->year, $this->month + $monthsAgo, $this->day);
        $output = Carbonate::monthsHence($monthsAgo);

        $this->performAssertions($expected, $output);
    }

    /** @test */
    public function months_positive()
    {
        $monthsAgo = rand(0, 30);
        $expected = Carbon::create($this->year, $this->month + $monthsAgo, $this->day);
        $output = Carbonate::months($monthsAgo);

        $this->performAssertions($expected, $output);
    }

    /** @test */
    public function months_negative()
    {
        $monthsAgo = rand(1, $this->month);
        $expected = Carbon::create($this->year, $this->month - $monthsAgo, $this->day);
        $output = Carbonate::months(-$monthsAgo);

        $this->performAssertions($expected, $output);
    }
}
