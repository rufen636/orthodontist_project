<?php

namespace App\Http\Controllers\Calculates;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class PlanningController extends Controller
{
    public function index($id)
    {
        $userId = auth()->id();
        $patient = Patient::where('id', $id)
            ->where('user_id', $userId)
            ->firstOrFail();

        return view('calculates.treatment_planning', compact( 'patient'));
    }
}
