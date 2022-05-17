<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ExceptionMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The body of the message.
     *
     * @var string
     */
    public $exception;
    public $secondException;
    public $fromDevServer;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($exception, $secondException=null, $fromDevServer = false)
    {
        $this->exception = $exception;
        $this->secondException = $secondException;
        $this->fromDevServer = $fromDevServer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->fromDevServer){
            Log::error(config('mail.mailers.smtp_alternative'));
            return $this
                ->subject(config('app.name') . ' Expection')
                ->from(config('mail.mailers.smtp_alternative.from'), config('mail.from.name'))
                ->view('mails.exceptions.exception')
                ->with('exception', $this->exception)
                ->with('secondException', $this->secondException);
        }else{
            return $this
                ->subject(config('app.name') . ' Expection')
                ->view('mails.exceptions.exception')
                ->with('exception', $this->exception)
                ->with('secondException', $this->secondException);
        }
    }
}
