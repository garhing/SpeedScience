<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Queue;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Queue\Events\JobProcessing;
use Illuminate\Queue\Events\JobFailed;
use App\Mail\mailReminder;

class MailLogger extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Queue::before(function (JobProcessing $event) {
//            echo "before\n";
//             echo $event->connectionName."\n";
//             $jdp = $event->job->payload();
//             echo $event->job->payload()."\n";

        });
        Queue::failing(function (JobFailed $event) {
//            echo "failing\n";
//            $mailReminder = $event->job;
//            dump($mailReminder);
//            echo gettype($event->job)."\n";
//            echo 'end';
        });
        Queue::after(function (JobProcessed $event) {
//            echo "after\n";
//            echo $event->connectionName."\n";
//            echo $event->job."\n";
//            echo $event->job->payload()."\n";
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
