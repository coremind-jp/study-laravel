<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AuthorizationController extends Controller
{
    //
    public function index()
    {
        return view('authorization.index');
    }

    public function doSomthingAsAdmin()
    {
        Gate::authorize('admin-only');

        return view('authorization.allow');
    }

    public function doSomthingAsChief()
    {
        Gate::authorize('chief-higher');

        return view('authorization.allow');
    }

    public function doSomthingAsUser()
    {
        Gate::authorize('user-higher');

        return view('authorization.allow');
    }
}
