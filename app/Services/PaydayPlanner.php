<?php

namespace App\Services;

use App\Models\Payday;
use Carbon\Carbon;

class PaydayPlanner
{
    const DAY = 10;

    public static function create(int $year = null, int $month = null): Payday
    {
        $date = Carbon::createFromDate($year, $month, self::DAY);

        // Weekend
        if ($date->format('l') === 'Sunday') {
            $date->subDays(2);
        }

        else if ($date->format('l') === 'Saturday') {
            $date->subDays(1);
        }

        // Good friday
        if ($date->format('Y-m-d') === Carbon::createFromDate($year . '-03-21')->addDays(easter_days($year))->subDays(2)->format('Y-m-d')) {
            $date->subDays(1);
        }

        return new PayDay($date->format('Y-m-d'), $date->subDays(3)->format('Y-m-d'));
    }
}
