<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderDetails extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;
    protected $frontendHost;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $frontendHost)
    {
        $this->order = $order;
        $this->frontendHost = $frontendHost;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Order Details',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return (new Content)
            ->view('emails.order-details')
            ->with('order', $this->order)
            ->with('frontendHost', $this->frontendHost);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
