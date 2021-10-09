<?php

namespace App\Console\Commands;

use App\Jobs\SendEmail;
use Illuminate\Console\Command;

class Broadcast extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'broadcast:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $emails = \App\Models\Broadcast::where('status',0)->with('template_email')->get()->take(60);
        foreach ($emails as $email){
            $subject = '[LIMITED TIME] Free 100 USDT only for you';
            $title = $email->template_email->title;
            $description = $email->template_email->description;
            $banner = $email->template_email->banner;
            $voucher = $email->template_email->voucher;
            $link = $email->template_email->link;

            echo $title.PHP_EOL;
//            $job = (new SendEmail($email->target, $subject, $title, $description, $banner, $voucher, $link));
//            dispatch($job);
        }
    }
}
