<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    function handleGoogleCallback()
    {
        try{
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();
            if($finduser)
            {
                Auth::Login($finduser);

                return redirect('/home');
            }
            else
            {
                $newUser = User::create([
                    'name'=> $user->name,
                    'email' => $user->email,
                    'number' => $user->id,
                    'google_id' => $user->id,
                    'password' => $user->id,
                    'password' => encrypt('123456dummy')
                ]);
                Auth::login($newUser);
                return redirect('/dashboard');
            }
        }

        catch (Exception $e)
        {
            dd($e->getMessage());
        }
    }
}
