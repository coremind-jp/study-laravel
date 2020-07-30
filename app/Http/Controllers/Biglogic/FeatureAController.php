<?php

namespace App\Http\Controllers\biglogic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeatureAController extends Controller
{
    //
    function logic()
    {
        return view('biglogic.feature_a.logic');
    }
}
