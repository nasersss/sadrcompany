<?php

namespace App\Jobs;

use App\Http\Controllers\NotificationController;
use App\Mail\Notification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\Notification as MailNotification;
use Illuminate\Support\Facades\Artisan;

class SendNotfications implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    public $request;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $request)
    {
        $this->data = $data;
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->data as $stCourse) {
            $notify =  NotificationController::sendNotificationFromAdmin($stCourse->student->id, $this->request->description, $this->request->url, 5);
            // $notify = Notification::where('to_user_id', $stCourse->student->id)->orderBy('id', 'desc')->first();
            if ($this->request->url_type == '3') {
                $MailNotification = new MailNotification($notify);
                Mail::to($stCourse->student->email)->send($MailNotification);
            }
        }
    }

    public function failed(\Throwable $e)
    {
        $e->getMessage();
    }
}
