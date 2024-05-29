<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class SendInvoice extends Mailable
{
    use Queueable, SerializesModels;

    public $mailData;
    public $invoice_details_number;




    /**
     * Create a new message instance.
     */


    public function __construct($mailData, $invoice_details_number)
    {
        $this->mailData = $mailData;
       $this->invoice_details_number=$invoice_details_number;
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
          //  subject: 'Send Invoice',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
           // view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'))->subject('Invoice '.$this->invoice_details_number.'')
                    ->view('mails.sendInvoice');


    }

}
