## Setup

1. Clone repository.
2. Run `composer install`.

## Usage

1. Run `php artisan serve` to start the PHP development server.
2. Make GET requests to `/api`, for example: `/api?year=2000` or `/api?year=2000&month=1`.

+ `year` query parameter is required and must be a valid year.
+ `month` query parameter is optional and must be a valid month.

## Created files for this assignment

+ /app/Http/Controllers/PaydayController.php
+ /app/Http/Resources/Payday.php
+ /app/Models/Payday.php
+ /app/Services/PaydayPlanner.php
+ /tests/Feature/PaydayTest.php
+ /tests/Unit/PaydayTest.php

## Modified files for this assignment

+ /routes/api.php

## Testing

+ Run `./vendor/bin/phpunit --testdox`

## Assignment information

+ Possibility to input a year and get pay dates for each month of the year.
+ Default payment day is 10th day of the month.
+ If that day is Sunday, the payment day will be moved 2 days earlier.
+ If that day is Saturday, the payment day will be moved 1 day earlier.
+ If that day is Holiday on a week day, the payment day will be moved 1 day earlier.
+ Possible clashing holiday is only Good Friday.
+ When correct payment day is set, set notify date 3 days earlier.
+ Output is json in freely chosen structure.
