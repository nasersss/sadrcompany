<?php

namespace App\Jobs;

use App\Models\data;
use App\Models\requests;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Mail;
use App\Mail\Notification as MailNotification;

class MailCertificate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    public $request;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data,$request)
    {
        $this->data = $data;
        $this->request= $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $notify =  NotificationController::sendNotificationFromAdmin($this->data->id, 'مبرووك , لقد حصلت على شهادة في دورة ' . $this->request->title, "printCertificate/".$this->request->id."/".$this->data->id, 3);
        $MailNotification = new MailNotification($notify);
        Mail::to($this->data->email)->send($MailNotification);
        
        
    }
}
