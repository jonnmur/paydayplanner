<?php

namespace App\Models;

use Carbon\Carbon;

class Payday
{
    private String $payDate;
    private String $notifyDate;

    public function __construct(String $payDate, String $notifyDate)
    {
        $this->payDate = $payDate;
        $this->notifyDate = $notifyDate;
    }

    public function getPayDate(): String
    {
        return $this->payDate;
    }

    public function getNotifyDate(): String
    {
        return $this->notifyDate;
    }
}
