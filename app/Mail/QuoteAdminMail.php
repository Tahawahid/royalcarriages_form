<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class QuoteAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public array $data,
    ) {}

    /**
     * Create a new message instance.
     */
    public function envelope(): Envelope
    {
        $replyEmail = $this->data['email'] ?? null;
        $replyName  = trim(($this->data['first_name'] ?? '') . ' ' . ($this->data['last_name'] ?? ''));

        return new Envelope(
            subject: 'Quote Royal Carriages Limousines',
            replyTo: $replyEmail ? [new Address($replyEmail, $replyName ?: null)] : [],
        );
    }

    /**
     * Get the message envelope.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.quote.royal-admin',
            with: [
                'data' => $this->data,
            ],
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
