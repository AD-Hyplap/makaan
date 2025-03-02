<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{

    /**
     * Get a JWT via given credentials and login.
     *
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = request(['email', 'password']);
        $token = auth()->attempt($credentials);

        if (!$token) {
            return redirect("/login");
        }

        return redirect(route('home'))->cookie('token', $token, env('JWT_TTL', 5), "/", null, false, true);
    }

    /**
     * Register a user
     */
    public function signup(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed']
        ]);

        $password = Hash::make($request->password);

        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $password;
        $user->save();

        $token = Auth::login($user);

        return redirect(route('home'))->cookie('token', $token, env('JWT_TTL', 5), "/", null, false, true);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     */
    public function logout(): RedirectResponse
    {
        auth()->logout();

        return redirect(route('login'));
    }

    public function profile()
    {
        return view('profile');
    }

}
