<?php

namespace Sfneal\Helpers\Time\Tests\Feature;

use Sfneal\Helpers\Time\Tests\Assets\Models\Task;
use Sfneal\Helpers\Time\Tests\TestCase;

class DurationTraitTest extends TestCase
{
    /**
     * @var Task
     */
    private $task;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->task = Task::query()->get()->shuffle()->first();
    }

    /** @test */
    public function total_duration()
    {
        $this->assertIsFloat($this->task->total_duration);
        $this->assertEquals($this->task->getAttribute('total_duration'), $this->task->total_duration);
    }

    /** @test */
    public function total_hours()
    {
        $this->task->total_duration = 135.5;

        $this->assertIsString($this->task->total_hours);
        $this->assertEquals('02:15', $this->task->total_hours);
    }

    /** @test */
    public function total_minutes()
    {
        $this->assertIsFloat($this->task->total_minutes);
        $this->assertEquals(floor($this->task->total_duration), $this->task->total_minutes);
    }

    /** @test */
    public function total_seconds()
    {
        $this->assertIsFloat($this->task->total_seconds);
        $this->assertEquals($this->task->total_duration * 60, $this->task->total_seconds);
    }

    /** @test */
    public function total_time()
    {
        $this->task->total_duration = 145.75;

        $this->assertIsString($this->task->total_time);
        $this->assertEquals('02:25:45', $this->task->total_time);
    }
}
