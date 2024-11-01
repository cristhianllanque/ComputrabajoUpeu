<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MetodoIngenuoEstacionalController extends Controller
{
    public function index()
    {
        return view('metodos.ingenuo_estacional');
    }

    public function calculate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'historical_values' => 'required|string',
            'season_length' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $historicalValues = array_map('floatval', explode(',', str_replace(' ', '', $request->historical_values)));
        $seasonLength = (int) $request->season_length;
        $forecast = $historicalValues[count($historicalValues) - $seasonLength];

        return response()->json([
            'series_name' => $request->series_name ?? 'Serie de Tiempo',
            'historical_values' => $historicalValues,
            'forecast' => $forecast,
        ]);
    }
}
