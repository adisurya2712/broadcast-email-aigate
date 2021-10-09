<?php

namespace App\Jobs;

use App\Models\VerifiedEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use romanzipp\QueueMonitor\Traits\IsMonitored;



class SendQueueEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, IsMonitored;


    protected $details;
    public $timeout = 7200; // 2 hours

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = VerifiedEmail::get();
        $input['subject'] = $this->details['subject'];
        $title = $this->details['title'];
        $description = $this->details['description'];
        $banner = $this->details['banner'];
        $voucher = $this->details['voucher'];
        $link = $this->details['link'];


        foreach ($data as $key => $value) {
            dispatch(new SendEmail($value, $title, $description, $banner, $voucher, $link));
        }
    }
}
