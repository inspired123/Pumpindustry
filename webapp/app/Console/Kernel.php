<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('update:news')
                 ->hourly();
        $schedule->command('update:events')
                ->twiceDaily(6, 18)
                ->timezone('Asia/Kolkata');

        $schedule->command('alert:mail')
        ->twiceDaily(8, 22)
        ->timezone('Asia/Kolkata');

        $schedule->command('alert:mail')
        ->dailyAt('14.30')
        ->timezone('Asia/Kolkata');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
