<?php
namespace App\Listeners;

use App\Events\SubjectStatuschanged;
use App\Jobs\SendChapterStatusEmail; // Import the SendChapterStatusEmailFromListener job
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Mail;

class SendSubjectStatusemail 
{
    /**
     * Handle the event.
     */
    public function handle(SubjectStatuschanged $event): void
    {
        $chapter = $event->chapter; // Access the $chapter instance from the event
        $email = Auth::user()->email;
        $chapter->email = $email;
        // dd($chapter);
        // Send the email using the Mailable
        // Mail::to($email)->send(new chapterStatus($chapter));

        // Dispatch the SendChapterStatusEmailFromListener job to send the email asynchronously
        SendChapterStatusEmail::dispatch($chapter);
    }
}
