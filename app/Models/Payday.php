<?php

namespace App\Models;

use Carbon\Carbon;

class Payday
{
    const DAY = 10;

    private int $year;
    private int $month;
    
    private String $payDate;
    private String $notifyDate;

    public function __construct($year, $month)
    {
        $this->year = $year;
        $this->month = $month;

        $this->setRealPayDate();
    }

    public function getPayDate()
    {
        return $this->payDate;
    }

    public function getNotifyDate()
    {
        return $this->notifyDate;
    }

    private function setRealPayDate()
    {
        $date = Carbon::createFromDate($this->year, $this->month, self::DAY);

        // Weekend
        if ($date->format('l') === 'Sunday') {
            $date->subDays(2);
        }

        else if ($date->format('l') === 'Saturday') {
            $date->subDays(1);
        }

        // Good friday
        if ($date->format('Y-m-d') === Carbon::createFromDate($this->year . '-03-21')->addDays(easter_days($this->year))->subDays(2)->format('Y-m-d')) {
            $date->subDays(1);
        }

        $this->payDate = $date->format('Y-m-d');
        $this->notifyDate = $date->subDays(3)->format('Y-m-d');
    }
}
