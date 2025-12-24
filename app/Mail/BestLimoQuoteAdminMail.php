<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BestLimoQuoteAdminMail extends Mailable
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
        $firstName  = $this->data['first_name'] ?? 'Customer';
        $siteName   = 'bestlimoquotes.com';
        $date       = now()->format('F j, Y');

        return new Envelope(
            subject: $siteName . ' : Quote Request - ' . $date,
            from: new Address('info@bestlimousines.com', $firstName),
            replyTo: $replyEmail ? [new Address($replyEmail, $replyName ?: null)]: [],
        );
    }

    /**
     * Get the message envelope.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.quote.admin',
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
