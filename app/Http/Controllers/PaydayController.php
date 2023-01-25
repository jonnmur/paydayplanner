<?php

namespace App\Http\Controllers;

use App\Http\Resources\Payday as PaydayResource;
use App\Services\PaydayPlanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaydayController extends Controller
{
    /**
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'year' => 'required|date_format:Y',
                'month' => 'date_format:m',
            ],
        );

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()], 422);
        }

        if ($request->has('month') && !empty($request->input('month'))) {
            $payDay = PaydayPlanner::create($request->input('year'), $request->input('month'));

            return new PaydayResource($payDay);
        }

        $payDays = [];

        for ($month=1; $month<=12; $month++) {
            $payDays[] = PaydayPlanner::create($request->input('year'), $month);
        }

        return PaydayResource::collection($payDays);
    }
}
