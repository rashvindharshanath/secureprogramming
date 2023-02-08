<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;



class SessionsController extends Controller
{
    public function create()
    {
        return view('session.login-session');
    }



    public function store()
    {
        $attributes = request()->validate([
            'email'=>'required|email',
            'password'=>'required' 
        ]);

        if(Auth::attempt($attributes))
        {
            session()->regenerate();
            return redirect('dashboard')->with(['success'=>'You are logged in.']);
        }
        else{

            return back()->withErrors(['email'=>'Email or password invalid.']);
        }
    }
    
    public function destroy()
    {

        Auth::logout();

        return redirect('/login')->with(['success'=>'You\'ve been logged out.']);
    }


    
    // login with github
    public function redirectToProviderGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */

    public function handleProviderCallbackGithub()
    {
        $user = Socialite::driver('github')->stateless()->user();

        // $user->token;
        // add user to datbase

        $user = User::firstOrCreate([
            'email' => $user->email,
        ], [
            'name' => $user->name,
            'password' => Hash::make('123456789'),
        ]);

        Auth::login($user);

        // go to this link /dashboard
       return redirect()->to('/dashboard');
    }


    //login with google
    public function redirectToProviderGoogle()
    {
        return Socialite::driver('google')->redirect();
    }



    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */

    public function handleProviderCallbackGoogle()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $user = User::firstOrCreate([
            'email' => $user->email,
        ], [
            'name' => $user->name,
            'password' => Hash::make('123456789'),
        ]);

        Auth::login($user);

        // go to this link /dashboard
         return redirect()->to('dashboard');
    }
}
