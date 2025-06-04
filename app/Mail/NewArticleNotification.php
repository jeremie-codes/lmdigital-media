<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Actualite;
use App\Models\Article;

class NewArticleNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $article;
    /**
     * Create a new message instance.
     */

    public function __construct($article)
    {
        $this->article = $article;
    }

    public function build()
    {
        return $this->subject('Nouvel article publié : ' . $this->article->title)
            ->view('emails.new-article');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Article Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
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
