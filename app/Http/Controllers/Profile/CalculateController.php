<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalculateController extends Controller
{
    public function index(){
        return view('profile.calculation');
    }

}
