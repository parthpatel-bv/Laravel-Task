<?php 
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Chapter; // Import the Chapter model

class chapterStatus extends Mailable
{
    use Queueable, SerializesModels;

    protected $chapter; // Declare the property

    /**
     * Create a new message instance.
     */
    public function __construct(Chapter $chapter) // Accept the Chapter instance
    {
        $this->chapter = $chapter; // Set the property
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.chapter.status-changed', [
            'chapter' => $this->chapter,
             // Pass the $chapter variable to the Blade view
        ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Chapter Status',
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
