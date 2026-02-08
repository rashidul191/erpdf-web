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
        $schedule->command('matching')->daily();
//        $schedule->command('transfer-cashback-to-commission')->daily();
        $schedule->command('deactivate-account')->daily();
        $schedule->command('psm:generate-income')->daily();
        $schedule->command('move:fund-to-backup')->daily();
        $schedule->command('give-income-generation')->dailyAt('00:05');
        $schedule->command('check:rank')->dailyAt('00:10');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
