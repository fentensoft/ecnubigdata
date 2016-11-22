<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\user;

class userController extends Controller
{
    public function postSignup(Request $request) {
        $this->validate($request, [
            'email' => 'required|email|unique:users|max:32',
            'password' => 'required|min:4|max:16',
            'username' => 'required|unique:users|alpha_dash|max:32',
            'location' => 'required|max:32'
        ]);

    	$user = new user();
    	$user->email = $request["email"];
    	$user->password = bcrypt($request["password"]);
        $user->location = $request['location'];
        $user->class = 1;
        $user->username = $request["username"];
        $user->rstudio = true;
        $user->jupyter = false;
        $ret = $user->save();
        $ret = $ret && platformController::addRstudio($request["username"], $request["password"]);
        $ret = $ret && platformController::toggleRstudio($user->id, false);
    	if ($ret)
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
        return redirect()->route('signin')->withErrors(["notify.danger" => "Login|Wrong email or password."]);
    }

    static public function delUser($id) {
        $ret = platformController::delPlatformUser($id);
        $ret = $ret && user::find($id)->delete();
        return $ret;
    }

}
