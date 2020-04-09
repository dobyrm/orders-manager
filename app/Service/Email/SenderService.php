<?php

namespace App\Service\Email;

final class SenderService extends SenderBaseService
{
    /**
     * Send to orders report
     *
     * @param $to
     * @param $data
     */
    public function ordersReport($to, $data)
    {
        $this->sender($to, trans('order.email.report.subject'), 'order.report', $data);
    }
}
