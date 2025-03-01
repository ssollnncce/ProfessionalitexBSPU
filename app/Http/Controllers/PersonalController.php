<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class PersonalController extends Controller
{
    public function redirectGetInfo(){
        $userPersonalInfo = Auth::user();

        return inertia::render('Account', compact('userPersonalInfo'));
    }
}
