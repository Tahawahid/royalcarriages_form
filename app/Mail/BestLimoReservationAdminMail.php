<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BestLimoReservationAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public array $data,
    ) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $replyEmail      = $this->data['email'] ?? null;
        $replyName       = trim(($this->data['first_name'] ?? '') . ' ' . ($this->data['last_name'] ?? ''));
        $firstName       = $this->data['first_name'] ?? 'Customer';
        $siteName        = 'bestlimousines.com';

        return new Envelope(
            subject: $siteName . ' : Reservations Request',
            from: new Address('info@bestlimousines.com', $firstName),
            replyTo: $replyEmail ? [new Address($replyEmail, $replyName ?: null)] : [],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $reservationType = $this->data['reservation_type'] ?? 'one-way';
        $template        = "emails.reservation.{$reservationType}-admin";

        return new Content(
            view: $template,
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
