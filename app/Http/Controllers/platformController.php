<?php

namespace App\Http\Controllers;

use App\user;
use Illuminate\Http\Request;

use App\Http\Requests;
use GuzzleHttp\Client;

class platformController extends Controller
{
    static public function addRstudio($username, $password) {
        exec("docker -H " . getenv("DOCKER_HOST") . " exec rstudio sh /usr/local/bin/add-user " . $username . " " . $password, $res, $ret);
        return ($ret == 0);
    }
    static public function delPlatformUser($userid) {
        $ret = 0;
        if ($userid != 1) {
            $user = user::where('id', $userid);
            exec("docker -H " . getenv("DOCKER_HOST") . " exec rstudio userdel -r " . $user->first()->username, $res, $ret);
            $ret = ($ret == 0) && self::toggleJupyter($userid, false);
            exec("docker -H " . getenv("DOCKER_HOST") . " rm -f jupyter-" . $user->first()->username, $res2, $ret2);
            $ret = $ret && ($ret2 == 0);
        }
        return $ret;
    }
    static public function toggleRstudio($userid, $isenable) {
        $ret = 0;
        if ($userid != 1) {
            $user = user::where('id', $userid);
            if ($user->rstudio != $isenable) {
                if ($isenable) {
                    exec("docker -H " . getenv("DOCKER_HOST") . " exec rstudio usermod -U " . $user->first()->username, $res, $ret);
                } else {
                    exec("docker -H " . getenv("DOCKER_HOST") . " exec rstudio usermod -L " . $user->first()->username, $res, $ret);
                }
                $ret = ($ret == 0) && $user->update(['rstudio' => $isenable]);
            }
        }
        return $ret;
    }
    static public function toggleJupyter($userid, $isenable) {
        $ret = false;
        if ($userid != 1) {
            $user = user::where('id', $userid);
            if ($user->first()->jupyter != $isenable) {
                $client = new Client();
                $request = new \GuzzleHttp\Psr7\Request(($isenable ? 'POST' : 'DELETE'), config('app.jupyterhub_host') . "/hub/api/users/" . $user->first()->username, ['Authorization' => 'token ' . config('app.jupyterhub_token')]);
                $ret = ($client->send($request)->getStatusCode() == ($isenable ? 201 : 204));
                $ret = $ret && $user->update(['jupyter' => $isenable]);
            }
        }
        return $ret;
    }
}
