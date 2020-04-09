<?php

namespace App\Service\Email;

use Illuminate\Support\Facades\Mail;

class SenderBaseService
{
    /**
     * Sender email
     *
     * @param $to
     * @param $subject
     * @param $template
     * @param array $data
     */
    public function sender($to, $subject, $template , $data = [])
    {
        Mail::send('emails.' . $template, ['data' => $data], function ($message) use ($to, $subject) {
            $message->from(config('mail.from.address'), config('mail.from.name'));
            $message->subject($subject);
            $message->to($to);
            $message->cc(config('mail.cc_addresses'));
        });
    }
}
