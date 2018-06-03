<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mockery\Exception;
use App\Http\Models\EmailLog;
use App\Http\Models\Config;
use App\Mail\mailReminder;
use Mail;
use Log;

class SendReminderEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $tries = 5;
    public $sendConfigs;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($sendConfigs)
    {
        $this->sendConfigs = $sendConfigs;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        sleep(1);
        Mail::to($this->sendConfigs['addr']);
    }

    public function failed(Exception $exception)
    {
        // 给用户发送失败通知，等等...
        echo $exception->getMessage();
    }

}