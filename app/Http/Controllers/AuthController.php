<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegisterRequest;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class AuthController extends Controller
{
    public function RedirectToLoginPage()
    {
        return Inertia::render('Login');
    }

    public function RedirectToRegisterPage()
    {
        return Inertia::render('Register');
    }
    
    public function LoginUser(AuthRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json(['message' => 'Login successful'], 200);
        }

        return response()->json(['errors' => ['email' => ['The provided credentials do not match our records.']]], 422);
    }

    public function RegisterUser(RegisterRequest $request)
    {
        try {
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'patronomyc' => $request->patronomyc,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
            ]);
            return response()->json(['message' => 'User registered successfully'], 201);
        } catch (\Exception $e) {
            Log::error('Registration error: ' . $e->getMessage());
            return response()->json(['message' => 'Error during registration', 'error' => $e->getMessage()], 422);
        }
    }

    public function LogoutUser()
    {
        Auth::logout();

        return redirect('/');
    }
}
