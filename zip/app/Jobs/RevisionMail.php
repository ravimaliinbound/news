<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RevisionMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $email;

    private $mail;

    /**
     * Create a new job instance.
     */
    public function __construct($email, $mail)
    {
        $this->email = $email;

        $this->mail = $mail;
    }

    /**
     * Execute the job.
     */
    public function handle(Mailer $mailer): void
    {
        $email = $this->email;
        $invoice = $this->mail['invoice_file'];

        $data['company_name'] = $this->mail['company_name'];
        $data['category'] = $this->mail['category'];

        $data['conname'] = $this->mail['conname'];
        $data['conemail'] = $this->mail['conemail'];
        $data['conmobile'] = $this->mail['conmobile'];
        $data['reference'] = $this->mail['reference'];

        $data['space_size'] = $this->mail['space_size'];
        $data['space_type'] = $this->mail['space_type'];
        $data['premium'] = $this->mail['premium'];
        $data['specific'] = $this->mail['specific'];
        $data['participated_in_plexpo'] = $this->mail['participated_in_plexpo'];
        $data['gspma_membership_no'] = $this->mail['gspma_membership_no'];
        $data['msme_certificate'] = $this->mail['msme_certificate'];

        $data['registration_fees'] = $this->mail['registration_fees'];
        $data['stall_rate'] = $this->mail['stall_rate'];
        $data['premium_for_corner_booth'] = $this->mail['premium_for_corner_booth'] ?? 0;
        $data['gspma_discount'] = $this->mail['gspma_discount'] ?? 'No';
        $data['loyalty_discount'] = $this->mail['loyalty_discount'] ?? 'No';
        $data['cash_discount'] = $this->mail['cash_discount'] ?? 0;
        $data['msme_discount'] = $this->mail['msme_discount'] ?? 'No';
        $data['early_bird_discount'] = $this->mail['early_bird_discount'] ?? 0;
        $data['special_discount'] = $this->mail['special_discount'] ?? 0;
        $data['subtotal'] = $this->mail['subtotal'] ?? 0;
        $data['grand_total'] = $this->mail['grand_total'] ?? 0;
        $data['grand_amount_before_date'] = $this->mail['grand_amount_before_date'] ?? 0;
        $data['grand_amount_after_date'] = $this->mail['grand_amount_after_date'] ?? 0;

        $data['gspma_status'] = $this->mail['gspma_status'] ?? 0;
        $data['gspma_status_reason'] = $this->mail['gspma_status_reason'] ?? 0;
        $data['loyalty_status'] = $this->mail['loyalty_status'] ?? 0;
        $data['loyalty_status_reason'] = $this->mail['loyalty_status_reason'] ?? 0;

        $data['msme_status'] = $this->mail['msme_status'] ?? 0;
        $data['msme_status_reason'] = $this->mail['msme_status_reason'] ?? 0;

        $mailer->send('mail.revision_mail', ['data' => $data], function ($message) use ($email, $invoice) {
            $message->from(env('MAIL_FROM_ADDRESS', 'mktg@plexpoindia.org'), env('APP_NAME', 'PLEXPOINDIA'));
            $message->subject('Important - Revised Pricing for Your PLEXPOINDIA 2024 Participation');
            $message->to($email);
            $message->cc('account@plexpoindia.org');
            $message->attach(public_path().'/invoice/'.$invoice);
        });
    }
}
