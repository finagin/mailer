<?php

namespace App\Mail\Api\v1;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Send extends Mailable
{
    use Queueable, SerializesModels;

    protected $values;

    /**
     * Create a new message instance.
     *
     * @param array $values
     * @return void
     */
    public function __construct($values)
    {
        $this->values = $values;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.api.v1.send')
            ->from($this->values['from'])
            ->to($this->values['to'])
            ->subject($this->values['subject'] ?? '')
            ->with(['body' => $this->values['body']]);
    }
}
