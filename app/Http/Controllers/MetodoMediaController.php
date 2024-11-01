<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MetodoMediaController extends Controller
{
    public function index()
    {
        return view('metodos.media');
    }

    public function calculate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'historical_values' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $historicalValues = array_map('floatval', explode(',', str_replace(' ', '', $request->historical_values)));
        $forecast = array_sum($historicalValues) / count($historicalValues);

        return response()->json([
            'series_name' => $request->series_name ?? 'Serie de Tiempo',
            'historical_values' => $historicalValues,
            'forecast' => $forecast,
        ]);
    }
}
