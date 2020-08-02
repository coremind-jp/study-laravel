<?php

namespace App\Http\Controllers\biglogic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeatureBController extends Controller
{
    //
    public function logic()
    {
        return view('biglogic.feature_b.logic');
    }
}
