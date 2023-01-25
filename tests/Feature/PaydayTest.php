<?php
 
namespace Tests\Feature;
 
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
 
class PaydayTest extends TestCase
{
    public function testApiReturnsPayDatesIfCorrectYearIsProvided()
    {
        $response = $this->call('GET', '/api', [
            'year' => '2020',
        ]);
 
        $response->assertStatus(200);

        $response->assertJson([
            'data' => [
                [
                    'payDate' => '2020-01-10',
                    'notifyDate' => '2020-01-07'
                ],
                [
                    'payDate' => '2020-02-10',
                    'notifyDate' => '2020-02-05'
                ],
                [
                    'payDate' => '2020-03-10',
                    'notifyDate' => '2020-03-05'
                ],
                [
                    'payDate' => '2020-04-09',
                    'notifyDate' => '2020-04-06'
                ],
                [
                    'payDate' => '2020-05-08',
                    'notifyDate' => '2020-05-05'
                ],
                [
                    'payDate' => '2020-06-10',
                    'notifyDate' => '2020-06-05'
                ],
                [
                    'payDate' => '2020-07-10',
                    'notifyDate' => '2020-07-07'
                ],
                [
                    'payDate' => '2020-08-10',
                    'notifyDate' => '2020-08-05'
                ],
                [
                    'payDate' => '2020-09-10',
                    'notifyDate' => '2020-09-07'
                ],
                [
                    'payDate' => '2020-10-09',
                    'notifyDate' => '2020-10-06'
                ],
                [
                    'payDate' => '2020-11-10',
                    'notifyDate' => '2020-11-05'
                ],
                [
                    'payDate' => '2020-12-10',
                    'notifyDate' => '2020-12-07'
                ],
            ],
        ]);
    }

    public function testApiReturnsErrorIfYearIsNotProvided()
    {
        $response = $this->call('GET', '/api');
 
        $response->assertStatus(422);

        $response->assertJson([
            'errors' => [
                'year' => ['The year field is required.'],
            ],
        ]);
    }

    public function testApiReturnsErrorIfInvalidYearIsProvided()
    {
        $response = $this->call('GET', '/api', [
            'year' => 'someinvalidyear',
        ]);
 
        $response->assertStatus(422);

        $response->assertJson([
            'errors' => [
                'year' => ['The year does not match the format Y.'],
            ],
        ]);
    }

    public function testApiReturnsErrorIfInvalidMonthIsProvided()
    {
        $response = $this->call('GET', '/api', [
            'year' => '2020',
            'month' => 'someinvalidmonth',
        ]);
 
        $response->assertStatus(422);

        $response->assertJson([
            'errors' => [
                'month' => ['The month does not match the format m.'],
            ],
        ]);
    }

    public function testApiReturnsOnePayDateIfCorrectYearAndMonthIsProvided()
    {
        $response = $this->call('GET', '/api', [
            'year' => '2020',
            'month' => '1',
        ]);
 
        $response->assertStatus(200);

        $response->assertJson([
            'data' => [
                'payDate' => '2020-01-10',
                'notifyDate' => '2020-01-07'
            ],
        ]);
    }
}
