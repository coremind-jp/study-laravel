<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoutesController extends Controller
{
    //
    public function parameters(
        int $require,
        string $option = 'empty',
        string $regexp = "empty",
        string $global_regexp = "empty",
        string $variable = "empty"
    ) {
        return view('routes.parameters', [
            'params' => [
                'require' => $require,
                'option' => $option,
                'regexp' => $regexp,
                'global_regexp' => $global_regexp,
                'variable' => $variable,
            ]
        ]);
    }
}
