<?php

namespace Sfneal\Helpers\Time\Tests\Unit;

use Sfneal\Helpers\Time\Tests\TestCase;
use Sfneal\Helpers\Time\TimeConverter;

class TimeConverterTest extends TestCase
{
    /**
     * @var bool
     */
    protected $seed = false;

    /**
     * @var float
     */
    private $value;

    /**
     * This method is called before each test.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        // Set a random value to be used as either hours, minutes or seconds
        $this->value = floatval(rand(1, 5000));
    }

    /** @test */
    public function hours_to_minutes()
    {
        $output = (new TimeConverter())->setHours($this->value)->minutes();
        $expected = $this->value * 60;

        $this->assertIsFloat($output);
        $this->assertEquals($output, $expected);
    }

    /** @test */
    public function hours_to_seconds()
    {
        $output = (new TimeConverter())->setHours($this->value)->seconds();
        $expected = $this->value * 3600;

        $this->assertIsFloat($output);
        $this->assertEquals($output, $expected);
    }

    /** @test */
    public function minutes_to_hours()
    {
        $output = (new TimeConverter())->setMinutes($this->value)->hours();
        $expected = $this->value / 60;

        $this->assertIsFloat($output);
        $this->assertEquals($output, $expected);
    }

    /** @test */
    public function minutes_to_seconds()
    {
        $output = (new TimeConverter())->setMinutes($this->value)->seconds();
        $expected = $this->value * 60;

        $this->assertIsFloat($output);
        $this->assertEquals($output, $expected);
    }

    /** @test */
    public function seconds_to_hours()
    {
        $output = (new TimeConverter())->setSeconds($this->value)->hours();
        $expected = $this->value / 3600;

        $this->assertIsFloat($output);
        $this->assertEquals($output, $expected);
    }

    /** @test */
    public function seconds_to_minutes()
    {
        $output = (new TimeConverter())->setSeconds($this->value)->minutes();
        $expected = $this->value / 60;

        $this->assertIsFloat($output);
        $this->assertEquals($output, $expected);
    }

    /** @test */
    public function hours_to_hours_string_with_seconds()
    {
        $output = (new TimeConverter())->setHours(7.19)->getHours(true);
        $expected = '07:11:24';

        $this->assertIsString($output);
        $this->assertStringContainsString(':', $output);
        $this->assertEquals($output, $expected);
    }

    /** @test */
    public function minutes_to_hours_string_with_seconds()
    {
        $output = (new TimeConverter())->setMinutes(135.5)->getHours(true);
        $expected = '02:15:30';

        $this->assertIsString($output);
        $this->assertStringContainsString(':', $output);
        $this->assertEquals($output, $expected);
    }

    /** @test */
    public function seconds_to_hours_string_with_seconds()
    {
        $output = (new TimeConverter())->setSeconds(11235)->getHours(true);
        $expected = '03:07:15';

        $this->assertIsString($output);
        $this->assertStringContainsString(':', $output);
        $this->assertEquals($output, $expected);
    }

    /** @test */
    public function hours_to_hours_string_without_seconds()
    {
        $output = (new TimeConverter())->setHours(9.67)->getHours(false);
        $expected = '09:40';

        $this->assertIsString($output);
        $this->assertStringContainsString(':', $output);
        $this->assertEquals($output, $expected);
    }

    /** @test */
    public function minutes_to_hours_string_without_seconds()
    {
        $output = (new TimeConverter())->setMinutes(147.12)->getHours(false);
        $expected = '02:27';

        $this->assertIsString($output);
        $this->assertStringContainsString(':', $output);
        $this->assertEquals($output, $expected);
    }

    /** @test */
    public function seconds_to_hours_string_without_seconds()
    {
        $output = (new TimeConverter())->setSeconds(54213)->getHours(false);
        $expected = '15:03';

        $this->assertIsString($output);
        $this->assertStringContainsString(':', $output);
        $this->assertEquals($output, $expected);
    }
}
