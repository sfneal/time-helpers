<?php

namespace Sfneal\Helpers\Time\Tests;

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Sfneal\Helpers\Time\Tests\Assets\Providers\TestingServiceProvider;
use Sfneal\Helpers\Time\Tests\Assets\Seeders\DatabaseSeeder;

class TestCase extends OrchestraTestCase
{
    use RefreshDatabase;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        // Create model factories
        $this->seed(DatabaseSeeder::class);
    }

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
}
