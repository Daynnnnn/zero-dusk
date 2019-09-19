<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class Dusk extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'dusk';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Run Browser Tests';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        require('tests/cauldron-2018.php');
    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
