<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\MailTemplate;

class ReferMember extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    private $data;

    public function __construct($referInfo)
    {
        $template = MailTemplate::where('slug', 'refer-member')->get()->first();

        // $template->content = preg_replace('/{%subject%}/i',$referInfo['subject'], $template->content);
        $template->content = preg_replace('/{%fullname%}/i',$referInfo['fullname'], $template->content);
        $template->content = preg_replace('/{%user_name%}/i',$referInfo['user_name'], $template->content);
        $template->content = preg_replace('/{%url%}/i',$referInfo['url'], $template->content);

        // dd($template);

        $this->data['template'] = $template->content;
        $this->data['subject'] = $template->subject;
    }

    /**
     * Get the message envelope.
     */


    public function build()
    {
        return $this->markdown('mail.referMember', $this->data)
            ->subject($this->data['subject'] ?? (env('APP_NAME'). " Refer Member"));

        /*return $this->from('test@test.com','Testing')
                    ->subject('Order')
                    ->view('emails.referMember')*/
    }



    /*public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Refer Member',
        );
    }*/



    /**
     * Get the message content definition.
     */
    /*public function content(): Content
    {
        return new Content(
            view: 'mail.referMember',
        );
    }*/

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    /*public function attachments(): array
    {
        return [];
    }*/
}
