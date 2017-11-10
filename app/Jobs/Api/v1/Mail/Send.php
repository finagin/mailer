<?php

namespace App\Jobs\Api\v1\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use App\Mail\Api\v1\Send as MailSend;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class Send implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $values;

    /**
     * Create a new job instance.
     *
     * @param array $values
     * @return void
     */
    public function __construct($values)
    {
        $this->values = $values;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if (isset($this->values['driver'])) {
            config(['mail.driver' => $this->values['driver']]);
        }

        Mail::send(new MailSend($this->values));
    }
}
