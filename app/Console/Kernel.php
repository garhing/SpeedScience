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
        \App\Console\Commands\AutoBanSubscribeJob::class,
        \App\Console\Commands\AutoCheckNodeStatusJob::class,
        \App\Console\Commands\AutoClearLogJob::class,
        \App\Console\Commands\AutoCloseOrderJob::class,
        \App\Console\Commands\RoutineJob::class,
        \App\Console\Commands\AutoStatisticsNodeDailyTrafficJob::class,
        \App\Console\Commands\AutoStatisticsNodeHourlyTrafficJob::class,
        \App\Console\Commands\AutoStatisticsUserDailyTrafficJob::class,
        \App\Console\Commands\AutoStatisticsUserHourlyTrafficJob::class,
        \App\Console\Commands\UserExpireWarningJob::class,
        \App\Console\Commands\UserTrafficAbnormalWarningJob::class,
        \App\Console\Commands\UserTrafficWarningJob::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     *
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('autoBanSubscribeJob')->everyThirtyMinutes();
        $schedule->command('autoCheckNodeStatusJob')->everyMinute();
        $schedule->command('autoClearLogJob')->everyThirtyMinutes();
        $schedule->command('autoCloseOrderJob')->everyMinute();
        $schedule->command('routineJob')->everyTenMinutes();
        $schedule->command('autoStatisticsNodeDailyTrafficJob')->dailyAt('04:30');
        $schedule->command('autoStatisticsNodeHourlyTrafficJob')->hourly();
        $schedule->command('autoStatisticsUserDailyTrafficJob')->dailyAt('03:00');
        $schedule->command('autoStatisticsUserHourlyTrafficJob')->hourly();
        $schedule->command('userExpireWarningJob')->daily();
        $schedule->command('userTrafficAbnormalWarningJob')->everyThirtyMinutes();
        $schedule->command('userTrafficWarningJob')->daily();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
