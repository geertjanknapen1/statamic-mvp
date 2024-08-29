<?php

namespace App\Listeners;

use App\Mail\TestMail;use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;use Illuminate\Support\Facades\Mail;use Illuminate\Support\Str;use Statamic\Events\FormSubmitted;

class FormListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(FormSubmitted $event)
    {
        if ($event->submission->form->handle() === 'test_form') {
            // get the email addresses this submission should be sent to
            $emailConfigs = $event->submission->form->email();
            $submissionData = $event->submission->data();

            // Foreach email address in the form, create a mailjob and dispatch
            foreach ($emailConfigs as $emailConfig) {
                // Regex to check for antlers tags, replace the {{ and }} so we get the field handle and then look in the form for the field data.
                if (Str::of($emailConfig['to'])->test("/\\{[^}]*\\}\\}/i")) {
                    $fieldHandle = str_replace(['{', ' ', '}'], '', $emailConfig['to']);
                    $email = $event->submission->data()[$fieldHandle];
                } else {
                    $email = $emailConfig['to'];
                }

                $submissionData = $submissionData->toArray();
                $submissionData['subject'] = 'Test Form Email subject';
                $submissionData['body'] = 'Test Form Email body';

                $mailable = new TestMail($submissionData);
                // Sent the email
                Mail::to($email)->locale('en')->send($mailable);
            }

            // Store the submission.
            $event->submission->save();

            // return false so Statamic does not send the e-mail (this also stops propagation of this event to other listeners!!).
            return false;
        }
        // return nothing so that propagation is not stopped unless another listener picks up and handles this event
    }
}
