<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MarkdownSampleMail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    
    private $attach;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        //
        $this->user = $user;

        $this->attach = "添付テスト";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->markdown('emails.markdown')
            ->text('emails.plain')
            ->with([
                'name' => $this->user->name,
            ])
            ->attachData($this->attach, 'sample.txt', [
                'mime' => 'text/plain',
            ]);
    }
}
