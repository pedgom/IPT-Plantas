<?php

namespace App\Exceptions;

use App\Mail\ExceptionMail;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;
use Exception;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            $this->sendEmail($e); // sends an em
        });
    }

    /**
     * Send the exception via email
     * @param Throwable $exception
     * @return void
     */
    public function sendEmail(Throwable $exception)
    {
        try {
            Mail::to(config('logging.email_destination_error_log'))->send(new ExceptionMail($exception));
        } catch (Exception $ex) {
            try{
                //send both exceptions
                Mail::mailer('smtp_alternative')->to(config('logging.email_destination_error_log'))->send(new ExceptionMail($exception, $ex, true));
            }catch (Exception $secondEx){
                Log::error($exception);
                Log::error($ex);
                Log::error($secondEx);
            }
        }
    }
}
