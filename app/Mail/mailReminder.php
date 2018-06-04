<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class mailReminder extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $tries = 2;
    public $sendConfigs;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sendConfigs)
    {
        //

        $this->sendConfigs = $sendConfigs;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.narrative.welcome')->with($this->sendConfigs);
    }

    /**
     * 写入邮件发送日志
     * @param int $user_id 接收者用户ID
     * @param string $title 标题
     * @param string $content 内容
     * @param int $status 投递状态
     * @param string $error 投递失败时记录的异常信息
     */
    private function sendEmailLog($user_id, $title, $content, $status = 1, $error = '')
    {
        $emailLogObj = new EmailLog();
        $emailLogObj->user_id = $user_id;
        $emailLogObj->title = $title;
        $emailLogObj->content = $content;
        $emailLogObj->status = $status;
        $emailLogObj->error = $error;
        $emailLogObj->created_at = date('Y-m-d H:i:s');
        $emailLogObj->save();
    }


}
