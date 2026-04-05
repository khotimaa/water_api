<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SensorData;

class SensorController extends Controller
{
    public function store(Request $request)
{
    $turbidity = $request->turbidity;
    $ph = $request->ph;
    $temperature = $request->temperature;
    $tds = $request->tds;

    // klasifikasi kualitas air
    if (
        $turbidity < 50 &&
        $ph >= 6.5 && $ph <= 8.5 &&
        $tds < 500
    ) {
        $status = "Layak";
    } else {
        $status = "Tidak Layak";
    }

    $data = SensorData::create([
        'turbidity' => $turbidity,
        'ph' => $ph,
        'temperature' => $temperature,
        'tds' => $tds,
        'status' => $status
    ]);

    return response()->json([
        'message' => 'Data sensor berhasil disimpan',
        'data' => $data
    ]);
}
}