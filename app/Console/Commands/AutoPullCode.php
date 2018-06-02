<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AutoPullCode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'webauto:pullcode';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '被web_API调用时，更新代码';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $path = base_path();
        $command = 'cd '.$path.' && '.'git pull origin master && git reset --hard origin/master';
        echo $command.' ';
        echo shell_exec($command);
//        echo system($command,$output);
//        echo $output;
    }
}
