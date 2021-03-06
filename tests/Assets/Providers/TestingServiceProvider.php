<?php

namespace Sfneal\Helpers\Time\Tests\Assets\Providers;

use Illuminate\Support\ServiceProvider;

class TestingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish migration file (if not already published)
        if (! class_exists('CreateTaskTable')) {
            $this->publishes([
                __DIR__.'/../migrations/create_task_table.php.stub' => database_path(
                    'migrations/'.date('Y_m_d_His', time()).'_create_task_table.php'
                ),
            ], 'migration');
        }
    }
}
