<?php

namespace Tests\Unit;

use Carbon\Carbon;
use App\Models\Payday;
use PHPUnit\Framework\TestCase;

class PaydayTest extends TestCase
{
    public function testGoodFridayChangesPayday()
    {
        $payday = new Payday(2020, 4);

        $this->assertEquals('2020-04-09', $payday->getPayDate());
    }

    public function testSaturdayChangesPayday()
    {
        $payday = new Payday(2020, 10);

        $this->assertEquals('2020-10-09', $payday->getPayDate());
    }

    public function testSundayChangesPayday()
    {
        $payday = new Payday(2021, 1);

        $this->assertEquals('2021-01-08', $payday->getPayDate());
    }

    public function testNotifyIsSetThreeDaysEarlierThanPayday()
    {
        $payday = new Payday(2020, 1);

        $this->assertEquals('2020-01-07', $payday->getNotifyDate());
    }
}
