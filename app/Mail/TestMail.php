<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;use Statamic\Entries\Entry;use Statamic\Facades\Antlers;

class TestMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public array|string $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array|string $data)
    {
        $this->data = (!is_string($data)) ? $data : json_decode($data);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $view = 'mail.test';

        // Parse antler tags within the content
        // It checks email_subject and email_body for {{ }} tags,
        // and it seems to match those against the variables in $this->data. If the names match, it seems they get replaced in the string
        $subject = $this->data['subject'];
        $emailBody = $this->data['body'];

        // We want to cast the newly parsed subject to a string, so it retains the variables but the mailable class will accept it.
        $stringCastedSubject = (string)$subject;

        return $this->view($view)
            ->subject($stringCastedSubject)
            ->with(['subject' => $subject, 'email_body' => $emailBody]);
    }
}
