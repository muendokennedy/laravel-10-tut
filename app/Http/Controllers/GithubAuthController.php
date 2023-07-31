<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GithubAuthController extends Controller
{
    // Redirect to github servers for Aunthentication
    public function redirect()
    {
        return Socialite::driver('github')->stateless()->redirect();
    }
    public function callback()
    {
        $githubUser = Socialite::driver('github')->stateless()->user();

        $user = User::firstOrCreate([
            'email' => $githubUser->email,
        ], [
            'name' => $githubUser->name,
            'password' => 'password'
        ]);
        Auth::login($user);
        return redirect(route('dashboard'))->with('message', 'The user has been logged in successfully with github');
    }
}
