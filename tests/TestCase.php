<?php

namespace Sfneal\Helpers\Time\Tests;

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Sfneal\Helpers\Time\Tests\Assets\Models\Task;
use Sfneal\Helpers\Time\Tests\Assets\Providers\TestingServiceProvider;

class TestCase extends OrchestraTestCase
{
    use RefreshDatabase;

    /**
     * Register package service providers.
     *
     * @param Application $app
     * @return array|string
     */
    protected function getPackageProviders($app)
    {
        return [
            TestingServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        include_once __DIR__ . '/Assets/migrations/create_task_table.php.stub';

        (new \CreateTaskTable())->up();
    }

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        // Create model factories
        Task::factory()
            ->count(20)
            ->create();
    }
}
