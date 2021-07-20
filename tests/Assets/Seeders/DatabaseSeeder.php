<?php


namespace Sfneal\Helpers\Time\Tests\Assets\Seeders;

use Illuminate\Database\Seeder;
use Sfneal\Helpers\Laravel\AppInfo;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (AppInfo::isEnvProduction()) {
            exit('You just tried to run a testing database seeder in production?!?!?!?');
        }

        $this->call(TaskSeeder::class);
    }
}
