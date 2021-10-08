<?php

namespace App\Http\Controllers;

use App\Mail\BroadcastEmail;
use App\Models\TemplateEmail;
use App\Models\VerifiedEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;


class BroadcastEmailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index(){
        $kontal_email = VerifiedEmail::all();


        foreach ($kontal_email as $item){

            Mail::to("testing@malasngoding.com")->send(new BroadcastEmail());
        }

        return "Email telah dikirim";
    }

    public function send_mail(Request $request,$id)
    {
        $email_template = TemplateEmail::where('id',$id)->first();

        $details = [
            'subject' => 'Promotion',
            'title' => $email_template->title,
            'description' => $email_template->description,
            'banner' => $email_template->banner,
            'voucher' => $email_template->voucher,
            'link' => $email_template->link,

        ];

        $job = (new \App\Jobs\SendQueueEmail($details))
            ->delay(now()->addSeconds(2));

        dispatch($job);
        Alert::success('Broadcast Email Success', 'Success Message');
        return redirect(url('/jobs'));
    }


}
