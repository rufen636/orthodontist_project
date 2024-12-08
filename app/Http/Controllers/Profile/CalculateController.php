<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class CalculateController extends Controller
{
    public function index(){
        $userId = auth()->id();
        $patients = Patient::where('user_id', $userId)->get();
        return view('profile.calculation',compact('patients'));
    }

}
