<?php

namespace App\Jobs;

use App\Models\Broadcast;
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
     * @param $details
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
        $data = VerifiedEmail::all()->toArray();
        $subject = $this->details['subject'];
        $title = $this->details['title'];
        $description = $this->details['description'];
        $banner = $this->details['banner'];
        $voucher = $this->details['voucher'];
        $link = $this->details['link'];

        foreach ($data as $item) {
            Broadcast::create([
                'target'=>$item['email'],
                'template_email_id'=>$this->details->id,
                'status'=>0,
            ]);
//            $job = (new SendEmail($item['email'], $subject, $title, $description, $banner, $voucher, $link))->delay(60);
//            dispatch($job);
        }
    }
}
