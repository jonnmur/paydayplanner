<?php

namespace App\Http\Controllers;

use App\Http\Resources\Payday as PaydayResource;
use App\Services\PaydayPlanner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaydayController extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'year' => 'required|date_format:Y',
            ],
        );

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()], 422);
        }

        $payDates = [];

        for ($month=1; $month<=12; $month++) {
            $payDates[] = PaydayPlanner::create($request->input('year'), $month);
        }

        return PaydayResource::collection($payDates);
    }
}
