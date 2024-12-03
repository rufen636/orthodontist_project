<?php

namespace App\Http\Controllers\Calculates;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BiometricsController extends Controller
{
    public function index()
    {
        return view('calculates.biometrics');
    }
}
