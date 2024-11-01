<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MetodoMediaMovilController extends Controller
{
    public function index()
    {
        return view('metodos.media_movil');
    }

    public function calculate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'historical_values' => 'required|string',
            'window' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $historicalValues = array_map('floatval', explode(',', str_replace(' ', '', $request->historical_values)));
        $window = (int) $request->window;
        $forecast = array_sum(array_slice($historicalValues, -$window)) / $window;

        return response()->json([
            'series_name' => $request->series_name ?? 'Serie de Tiempo',
            'historical_values' => $historicalValues,
            'forecast' => $forecast,
        ]);
    }
}
