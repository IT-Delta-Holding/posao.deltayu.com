<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display register page.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(){
        return view('auth.register');
    }

    /**
     * Handle account registration request
     *
     * @param RegisterRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request){
        return User::create([
            'name' => $request['name'],
            'company' => $request['company'],
            'email' => $request['email'],
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
        ]);
//        auth()->login($user);
//        return redirect('/')->with('success', 'Account successfully registered.');
    }
}
