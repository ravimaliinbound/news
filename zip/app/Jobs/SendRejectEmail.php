<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendRejectEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $name;

    private $email;

    private $reason;

    /**
     * Create a new job instance.
     */
    public function __construct($name, $email, $reason)
    {
        $this->name = $name;

        $this->email = $email;

        $this->reason = $reason;
    }

    /**
     * Execute the job.
     */
    public function handle(Mailer $mailer): void
    {
        $email = $this->email;

        $data['name'] = $this->name;
        $data['reason'] = $this->reason;

        $mailer->send('mail.send_reject_mail', ['data' => $data], function ($message) use ($email) {
            $message->from(env('MAIL_FROM_ADDRESS', 'mktg@plexpoindia.org'), env('APP_NAME', 'PLEXPOINDIA'));
            $message->subject('Your registration has been Rejected - PLEXPOINDIA 2024');
            $message->to($email);
            $message->cc('account@plexpoindia.org');
        });
    }
}
