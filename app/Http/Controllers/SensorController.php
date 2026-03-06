<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SensorData;

class SensorController extends Controller
{
    public function store(Request $request)
    {
        $turbidity = $request->turbidity;

        // klasifikasi sederhana
        if ($turbidity < 50) {
            $status = "Layak";
        } else {
            $status = "Tidak Layak";
        }

        $data = SensorData::create([
            'turbidity' => $turbidity,
            'status' => $status
        ]);

        return response()->json([
            'message' => 'Data sensor berhasil disimpan',
            'data' => $data
        ]);
    }
}