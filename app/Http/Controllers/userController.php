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

    	$user = new user();
    	$user->email = $request["email"];
    	$user->password = bcrypt($request["password"]);
        $user->location = $request['location'];
        $user->class = 1;
        $user->realname = $request["realname"];

    	$user->save();

        \Auth::login($user);

    	return redirect()->route('dashboard');
    }

    public function postSignin(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);

        if (\Auth::attempt(["email" => $request["email"], "password" => $request["password"]])) {
            return redirect()->route('dashboard');
        }
        return redirect()->route('home')->withErrors(["error" => "Wrong email or password."]);
    }

}
