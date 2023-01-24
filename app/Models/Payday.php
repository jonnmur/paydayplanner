<?php

namespace App\Models;

use Carbon\Carbon;

class Payday
{
    private String $payDate;
    private String $notifyDate;

    /**
     * @param string $payDate
     * @param string $notifyDate
     */
    public function __construct(String $payDate, String $notifyDate)
    {
        $this->payDate = $payDate;
        $this->notifyDate = $notifyDate;
    }

    /**
     * @return string $payDate
     */
    public function getPayDate(): String
    {
        return $this->payDate;
    }

    /**
     * @return string $notifyDate
     */
    public function getNotifyDate(): String
    {
        return $this->notifyDate;
    }
}
