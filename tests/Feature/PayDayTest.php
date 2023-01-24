<?php
 
namespace Tests\Feature;
 
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
 
class PaydayTest extends TestCase
{
    public function testApiReturnsPayDatesIfCorrectYearIsProvided()
    {
        $response = $this->get('/api?year=2020');
 
        $response->assertStatus(200);

        $response->assertJson([
            'data' => [
                [
                    'payDate' => '2020-01-10',
                    'notifyDate' => '2020-01-07'
                ],
                [
                    'payDate' => '2020-02-10',
                    'notifyDate' => '2020-02-07'
                ],
                [
                    'payDate' => '2020-03-10',
                    'notifyDate' => '2020-03-07'
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
                    'notifyDate' => '2020-06-07'
                ],
                [
                    'payDate' => '2020-07-10',
                    'notifyDate' => '2020-07-07'
                ],
                [
                    'payDate' => '2020-08-10',
                    'notifyDate' => '2020-08-07'
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
                    'notifyDate' => '2020-11-07'
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
        $response = $this->get('/api');
 
        $response->assertStatus(422);

        $response->assertJson([
            'errors' => [
                'year' => ['The year field is required.'],
            ],
        ]);
    }

    public function testApiReturnsErrorIfInvalidYearIsProvided()
    {
        $response = $this->get('/api?year=someinvalidyear');
 
        $response->assertStatus(422);

        $response->assertJson([
            'errors' => [
                'year' => ['The year does not match the format Y.'],
            ],
        ]);
    }
}