<?php

namespace App\Services;

use App\Models\Payday;
use Carbon\Carbon;

class PaydayPlanner
{
    private const DAY = 10; // Default pay day
    private const NOTIFY = 3; // Notify days before pay day

    /**
     * @param int $year
     * @param int $month
     * @return Payday
     */
    public static function create(int $year = null, int $month = null): Payday
    {
        // Convert to date
        $date = Carbon::createFromDate($year, $month, self::DAY);

        // Calculate pay date
        $payDate = self::calcDate($date);

        // Calculate notify date by checking that each previous day is working day
        $notifyDate = $payDate->copy();

        for ($i=1; $i<=self::NOTIFY; $i++) {
            $notifyDate = self::calcDate($notifyDate->subDays(1));
        }

        return new PayDay($payDate->format('Y-m-d'), $notifyDate->format('Y-m-d'));
    }

    private function calcDate($date)
    {
        // Weekend
        if ($date->format('l') === 'Sunday') {
            $date->subDays(2);
        }
        else if ($date->format('l') === 'Saturday') {
            $date->subDays(1);
        }

        // Good friday
        if ($date->format('Y-m-d') === Carbon::createFromDate($date->format('Y') . '-03-21')->addDays(easter_days($date->format('Y')))->subDays(2)->format('Y-m-d')) {
            $date->subDays(1);
        }

        return $date;
    }
}
