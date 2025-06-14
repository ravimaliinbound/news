<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendSignupEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $name;

    private $email;

    /**
     * Create a new job instance.
     */
    public function __construct($name, $email)
    {
        $this->name = $name;

        $this->email = $email;
    }

    /**
     * Execute the job.
     */
    public function handle(Mailer $mailer): void
    {
        $email = $this->email;

        $data['name'] = $this->name;

        $mailer->send('mail.signup_mail', ['data' => $data], function ($message) use ($email) {
            $message->from(env('MAIL_FROM_ADDRESS', 'mktg@plexpoindia.org'), env('APP_NAME', 'PLEXPOINDIA'));
            $message->subject('Welcome to PLEXPOINDIA 2024 - Your Registration is Confirmed!');
            $message->to($email);
            $message->cc('account@plexpoindia.org');
        });
    }
}
