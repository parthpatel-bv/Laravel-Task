<?php
namespace App\Jobs;

use App\Mail\chapterStatus;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SendChapterStatusEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $chapter; // Declare the property to hold the chapter instance
    protected $email;
    /**
     * Create a new job instance.
     */
    public function __construct($chapter)
    {
        $this->chapter = $chapter; // Set the property
        $this->email = $this->chapter->email;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
{
    Mail::to($this->email)->send(new chapterStatus($this->chapter));
}

}
