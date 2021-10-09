<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $target;
    private $title;
    private $description;
    private $banner;
    private $voucher;
    private $link;
    private $subject;

    /**
     * Create a new job instance.
     *
     * @param $target
     * @param $subject
     * @param $title
     * @param $description
     * @param $banner
     * @param $voucher
     * @param $link
     */
    public function __construct($target, $subject, $title, $description, $banner, $voucher, $link)
    {
        $this->target = $target;
        $this->title = $title;
        $this->description = $description;
        $this->banner = $banner;
        $this->voucher = $voucher;
        $this->link = $link;
        $this->subject = $subject;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $target = $this->target;
        \Mail::send('EmailTemplate.Template1', ['title'=>$this->title,'description'=>$this->description,'banner'=>$this->banner,'voucher'=>$this->voucher,'link'=>$this->link], function($message) use($target){
            $message->to($target, 'Someone')
                ->subject($this->subject);
        });
    }
}
