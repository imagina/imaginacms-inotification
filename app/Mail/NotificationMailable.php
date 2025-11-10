<?php

namespace Modules\Inotification\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;

class NotificationMailable extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $subject;
    public $view;
    public $fromAddress;
    public $fromName;
    public $data;
    public $replyTo;
    public $attachment;
    private $log = "Inotification:: Mail|NotificationMailable|";

    /**
     * Create a new message instance.
     *
     * @param $user
     * @param $auction
     */
    public function __construct($data, $subject, $view, $fromAddress = null, $fromName = null, $replyTo = [], $attachment = null)
    {
        $this->data = $data;
        $this->subject = $subject;
        $this->view = $view;
        $this->fromAddress = $fromAddress;
        $this->fromName = $fromName;
        $this->replyTo = $replyTo ?? [];

        if (empty($this->replyTo)) {
            $this->replyTo = [];
        }

        $this->attachment = $attachment;
    }

    /**
     * Build the message.
     */
    /* public function build()*/
    public function build()
    {
        \Log::info($this->log . 'Build');

        try {
            $email = $this->from($this->fromAddress ?? env('MAIL_FROM_ADDRESS'), $this->fromName ?? env('MAIL_FROM_NAME'))
                ->view($this->view)
                ->subject($this->subject)
                ->replyTo($this->replyTo ?? []);

            //Validation to atachment
            if (!is_null($this->attachment)) {
                $attachment = $this->attachment;

                if (!empty($attachment['fileData']) && !empty($attachment['fileName'])) {
                    $email->attachData(
                        base64_decode($this->attachment['fileData']),
                        $attachment['fileName'],
                        ['mime' => $attachment['fileMimeType'] ?? 'application/pdf']
                    );
                }
            }

            return $email;
        } catch (\Exception $e) {
            \Log::error($this->log . 'Error: ' . $e->getMessage() . "\n" . $e->getFile() . "\n" . $e->getLine() . $e->getTraceAsString());
        }
    }
}
