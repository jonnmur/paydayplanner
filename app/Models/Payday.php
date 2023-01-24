<?php

namespace App\Models;

use Carbon\Carbon;

class Payday
{
    private String $payDate;
    private String $notifyDate;

    public function __construct($payDate, $notifyDate)
    {
        $this->payDate = $payDate;
        $this->notifyDate = $notifyDate;
    }

    public function getPayDate()
    {
        return $this->payDate;
    }

    public function getNotifyDate()
    {
        return $this->notifyDate;
    }
}
