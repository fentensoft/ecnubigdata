<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\user;

class userController extends Controller
{
    public function postSignup(Request $request) {
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4'
        ]);

    	$email = $request["email"];
    	$password = bcrypt($request["password"]);

    	$user = new user();
    	$user->email = $email;
    	$user->password = $password;

    	$user->save();

        \Auth::login($user);

    	return redirect()->route('dashboard');
    }

    public function postSignin(Request $request) {
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4'
        ]);

        if (\Auth::attempt(["email" => $request["email"], "password" => $request["password"]])) {
            return redirect()->route('dashboard');
        }
        return redirect()->route('home')->withErrors(["error" => "Wrong email or password."]);
    }

}
