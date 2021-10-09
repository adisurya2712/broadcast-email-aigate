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

    private $value;
    private $title;
    private $description;
    private $banner;
    private $voucher;
    private $link;

    /**
     * Create a new job instance.
     *
     * @param $value
     */
    public function __construct($value, $title, $description, $banner, $voucher, $link)
    {
        $this->value = $value;
        $this->title = $title;
        $this->description = $description;
        $this->banner = $banner;
        $this->voucher = $voucher;
        $this->link = $link;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $input['email'] = $this->value->email;
        $input['name'] = $this->value->email;
        \Mail::send('EmailTemplate.Template1', ['title'=>$this->title,'description'=>$this->description,'banner'=>$this->banner,'voucher'=>$this->voucher,'link'=>$this->link], function($message) use($input){
            $message->to($input['email'], $input['name'])
                ->subject($input['subject']);
        });
    }
}
