<?php

namespace Sfneal\Helpers\Time\Tests\Assets\Seeders;

use Illuminate\Database\Seeder;
use Sfneal\Helpers\Time\Tests\Assets\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::factory()
            ->count(20)
            ->create();
    }
}
