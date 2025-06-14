<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendApprovalMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $email;

    private $name;

    /**
     * Create a new job instance.
     */
    public function __construct($email, $name)
    {
        $this->email = $email;

        $this->name = $name;
    }

    /**
     * Execute the job.
     */
    public function handle(Mailer $mailer): void
    {
        $email = $this->email;

        $data['name'] = $this->name;

        $mailer->send('mail.vendor_approval_mail', ['data' => $data], function ($message) use ($email) {
            $message->from(env('MAIL_FROM_ADDRESS', 'mktg@plexpoindia.org'), env('APP_NAME', 'PLEXPOINDIA'));
            $message->subject('Your Vendor Profile has been approved by PLEXPOINDIA 2024');
            $message->to($email);
            $message->cc('account@plexpoindia.org');
        });
    }
}
