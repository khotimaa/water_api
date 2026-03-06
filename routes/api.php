<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SensorController;

Route::post(uri: '/sensor', action: [SensorController::class, 'store']);