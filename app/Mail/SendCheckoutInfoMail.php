<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendCheckoutInfoMail extends Mailable
{
    use Queueable, SerializesModels;

    private $cartInfo;
    private $message1 = "Thank you for choosing our premium furniture selections to meet your needs. Below is a summary of your recent purchase:";
    private $message2 = "We appreciate your business and are committed to ensuring your satisfaction. If you have any questions or need further assistance, please don't hesitate to reach out to our customer service team.";
    private $message3 = "Once again, thank you for choosing us for your furniture needs. We look forward to serving you again in the future.";

    /**
     * Create a new message instance.
     */
    public function __construct($cartInfo)
    {
        $this->cartInfo = $cartInfo;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Checkout Furnitures',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.checkoutinfo',
            with: [
                'cartInfo' => $this->cartInfo,
                'message1' => $this->message1,
                'message2' => $this->message2,
                'message3' => $this->message3,
            ]
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
}
