<?php

namespace Tests\Unit;

use Carbon\Carbon;
use App\Services\PaydayPlanner;
use PHPUnit\Framework\TestCase;

class PaydayTest extends TestCase
{
    public function testGoodFridayChangesPayday()
    {
        $payday = PaydayPlanner::create(2020, 4);

        $this->assertEquals('2020-04-09', $payday->getPayDate());
    }

    public function testWeekendAndGoodFridayChangesPayday()
    {
        // Planned payday is on 2039-04-10 Sunday. That gets changed to 2039-04-08 Good Friday, so it should be 2039-04-07.
        $payday = PaydayPlanner::create(2039, 4);

        $this->assertEquals('2039-04-07', $payday->getPayDate());
    }

    public function testSaturdayChangesPayday()
    {
        $payday = PaydayPlanner::create(2020, 10);

        $this->assertEquals('2020-10-09', $payday->getPayDate());
    }

    public function testSundayChangesPayday()
    {
        $payday = PaydayPlanner::create(2021, 1);

        $this->assertEquals('2021-01-08', $payday->getPayDate());
    }

    public function testNotifyIsSetThreeDaysEarlierThanPayday()
    {
        $payday = PaydayPlanner::create(2021, 1);

        $this->assertEquals('2021-01-05', $payday->getNotifyDate());
    }
}
