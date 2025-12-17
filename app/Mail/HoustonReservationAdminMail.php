<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class HoustonReservationAdminMail extends Mailable
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
        $reservationType = ucwords(str_replace('-', ' ', $this->data['reservation_type'] ?? 'Reservation'));
        $replyEmail      = $this->data['email'] ?? null;
        $replyName       = trim(($this->data['first_name'] ?? '') . ' ' . ($this->data['last_name'] ?? ''));
        return new Envelope(
            subject: $reservationType . ' Reservation Limo Service In Houston',
            replyTo: $replyEmail ? [new Address($replyEmail, $replyName ?: null)] : [],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $reservationType = $this->data['reservation_type'] ?? 'one-way';
        $template        = "emails.reservation.houston-{$reservationType}-admin";

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
