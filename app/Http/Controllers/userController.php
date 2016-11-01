<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

use App\Http\Requests;

use App\user;

class userController extends Controller
{
    public function postSignup(Request $request) {
        $this->validate($request, [
            'email' => 'required|email|unique:users|max:32',
            'password' => 'required|min:4|max:16',
            'username' => 'required|alpha_dash|max:32',
            'location' => 'required|max:32'
        ]);

    	$user = new user();
    	$user->email = $request["email"];
    	$user->password = bcrypt($request["password"]);
        $user->location = $request['location'];
        $user->class = 1;
        $user->username = $request["username"];

    	$user->save();

        //Add jupyterhub user
        $client = new Client();
        $request = new \GuzzleHttp\Psr7\Request('POST', config('app.jupyterhub_host') . "/hub/api/users/" . $request["username"], ['Authorization' => 'token ' . config('app.jupyterhub_token')]);
        if ($client->send($request)->getStatusCode() == 201)
            \Auth::login($user);

    	return redirect()->route('dashboard');
    }

    public function postSignin(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);

        if (\Auth::attempt(["email" => $request["email"], "password" => $request["password"]])) {
            return redirect()->intended(route('dashboard'));
        }
        return redirect()->route('home')->withErrors(["notify.error" => "Login|Wrong email or password."]);
    }

}
