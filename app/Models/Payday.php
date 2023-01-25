<?php

namespace App\Models;

class Payday
{
    private string $payDate;
    private string $notifyDate;

    /**
     * @param string $payDate
     * @param string $notifyDate
     */
    public function __construct(string $payDate, string $notifyDate)
    {
        $this->payDate = $payDate;
        $this->notifyDate = $notifyDate;
    }

    /**
     * @return string $payDate
     */
    public function getPayDate(): string
    {
        return $this->payDate;
    }

    /**
     * @return string $notifyDate
     */
    public function getNotifyDate(): string
    {
        return $this->notifyDate;
    }
}
