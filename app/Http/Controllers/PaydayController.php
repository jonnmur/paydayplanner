<?php

namespace App\Http\Controllers;

use App\Http\Resources\Payday as PaydayResource;
use App\Models\Payday;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

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
            $payDates[] = new Payday($request->input('year'), $month);
        }

        return PaydayResource::collection($payDates);
    }
}
