<?php

namespace Sfneal\Helpers\Time\Tests;

use PHPUnit\Framework\TestCase;
use Sfneal\Helpers\Time\TimeConverter;

class TimeConverterTest extends TestCase
{
    /**
     * @var float
     */
    private $value;

    /**
     * This method is called before each test.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        // Set a random value to be used as either hours, minutes or seconds
        $this->value = floatval(rand(1, 5000));
    }

    /** @test */
    public function hours_to_minutes()
    {
        $expected = (new TimeConverter())->setHours($this->value)->minutes();
        $output = $this->value * 60;

        $this->assertIsFloat($expected);
        $this->assertEquals($expected, $output);
    }

    /** @test */
    public function hours_to_seconds()
    {
        $expected = (new TimeConverter())->setHours($this->value)->seconds();
        $output = $this->value * 3600;

        $this->assertIsFloat($expected);
        $this->assertEquals($expected, $output);
    }

    /** @test */
    public function minutes_to_hours()
    {
        $expected = (new TimeConverter())->setMinutes($this->value)->hours();
        $output = $this->value / 60;

        $this->assertIsFloat($expected);
        $this->assertEquals($expected, $output);
    }

    /** @test */
    public function minutes_to_seconds()
    {
        $expected = (new TimeConverter())->setMinutes($this->value)->seconds();
        $output = $this->value * 60;

        $this->assertIsFloat($expected);
        $this->assertEquals($expected, $output);
    }

    /** @test */
    public function seconds_to_hours()
    {
        $expected = (new TimeConverter())->setSeconds($this->value)->hours();
        $output = $this->value / 3600;

        $this->assertIsFloat($expected);
        $this->assertEquals($expected, $output);
    }

    /** @test */
    public function seconds_to_minutes()
    {
        $expected = (new TimeConverter())->setSeconds($this->value)->minutes();
        $output = $this->value / 60;

        $this->assertIsFloat($expected);
        $this->assertEquals($expected, $output);
    }

    /** @test */
    public function hours_to_hours_string_with_seconds()
    {
        $expected = (new TimeConverter())->setHours(7.19)->getHours();
        $output = "07:11:24";

        $this->assertIsString($expected);
        $this->assertStringContainsString(':', $expected);
        $this->assertEquals($expected, $output);
    }

    /** @test */
    public function minutes_to_hours_string_with_seconds()
    {
        $expected = (new TimeConverter())->setMinutes(135.5)->getHours();
        $output = "02:15:30";

        $this->assertIsString($expected);
        $this->assertStringContainsString(':', $expected);
        $this->assertEquals($expected, $output);
    }

    /** @test */
    public function seconds_to_hours_string_with_seconds()
    {
        $expected = (new TimeConverter())->setSeconds(11235)->getHours();
        $output = "03:07:15";

        $this->assertIsString($expected);
        $this->assertStringContainsString(':', $expected);
        $this->assertEquals($expected, $output);
    }


    /** @test */
    public function hours_to_hours_string_without_seconds()
    {
        $expected = (new TimeConverter())->setHours(9.67)->getHours(false);
        $output = "09:40";

        $this->assertIsString($expected);
        $this->assertStringContainsString(':', $expected);
        $this->assertEquals($expected, $output);
    }

    /** @test */
    public function minutes_to_hours_string_without_seconds()
    {
        $expected = (new TimeConverter())->setMinutes(147.12)->getHours(false);
        $output = "02:27";

        $this->assertIsString($expected);
        $this->assertStringContainsString(':', $expected);
        $this->assertEquals($expected, $output);
    }

    /** @test */
    public function seconds_to_hours_string_without_seconds()
    {
        $expected = (new TimeConverter())->setSeconds(54213)->getHours(false);
        $output = "15:03";

        $this->assertIsString($expected);
        $this->assertStringContainsString(':', $expected);
        $this->assertEquals($expected, $output);
    }
}
