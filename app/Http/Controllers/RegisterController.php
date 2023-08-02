<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    /** Display register page */
    public function show(){
        return view('auth.register');
    }

    /** Handle account registration request */

    public function register(RegisterRequest $request){
        $user = User::create($request->validated());

        auth()->login($user);

        return redirect('/')->with('success', 'Account successfully registered');
    }
}

