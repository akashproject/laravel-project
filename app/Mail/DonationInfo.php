<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\MailTemplate;
class DonationInfo extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $pdf;

    public function __construct($data, $pdf)
    {
        $this->data = $data;
        $this->pdf = $pdf;

        $template = MailTemplate::where('slug', 'donation-info')->first();

        $template->content = preg_replace('/{%name%}/i',$data['name'] , $template->content);
        $template->content = preg_replace('/{%email%}/i',$data['email'] , $template->content);
        $template->content = preg_replace('/{%amount%}/i',$data['amount'] , $template->content);
        $template->content = preg_replace('/{%country%}/i',$data['country'] , $template->content);

        $this->data['template'] = $template->content;
        $this->data['subject'] = $template->subject;
    }

    public function build()
    {
        $setting = siteData();
        
        return $this->markdown('mail.donation-info',$this->data)
            ->subject($this->data['subject'] ?? (env('APP_NAME'). " Donation Information"))
            ->from($setting['site_email'])
            ->attachData($this->pdf->output(), 'donation_info.pdf', [
                'mime' => 'application/pdf',
        ]);
    }
}
