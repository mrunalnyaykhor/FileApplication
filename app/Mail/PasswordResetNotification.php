<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PasswordResetNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $newPassword;

    /**
     * Create a new message instance.
     *
     * @param string $newPassword The new password
     * @return void
     */
    public function __construct($newPassword)
    {
        $this->newPassword = $newPassword;
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Password Reset Notification',
        );
    }

    public function build()
    {
        return $this->subject('Your New Password')
                    ->view('mail.password_reset_notification'); // Create a Blade template for the email content
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.password_reset_notification',
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
