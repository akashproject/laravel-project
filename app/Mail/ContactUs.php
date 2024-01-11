<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\MailTemplate;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;

    private $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contactInfo)
    {
        $template = MailTemplate::where('slug', 'contact-info')->get()->first();

        $template->content = preg_replace('/{%name%}/i',$contactInfo['name'] , $template->content);
        $template->content = preg_replace('/{%email%}/i',$contactInfo['email'] , $template->content);
        $template->content = preg_replace('/{%subject%}/i',$contactInfo['subject'] , $template->content);
        $template->content = preg_replace('/{%message%}/i',$contactInfo['message'] ,$template->content);

        $this->data['template'] = $template->content;
        $this->data['subject'] = $template->subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.contact-us', $this->data)->subject( $this->data['subject'] ?? (env('APP_NAME'). " Contact Message"));

    }
}
