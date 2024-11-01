<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MetodoIngenuoController extends Controller
{
    // Renderizar la vista del método ingenuo
    public function index()
    {
        return view('metodos.ingenuo');
    }

    // Procesar los datos y devolver el pronóstico
    public function calculate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'historical_values' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Procesar los valores históricos
        $historicalValues = explode(',', str_replace(' ', '', $request->historical_values));
        $historicalValues = array_map('floatval', $historicalValues);

        // Pronóstico Ingenuo (último valor de la serie)
        $forecast = end($historicalValues);

        return response()->json([
            'series_name' => $request->series_name ?? 'Serie de Tiempo',
            'historical_values' => $historicalValues,
            'forecast' => $forecast,
        ]);
    }
}
