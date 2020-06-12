<?php

namespace App\Http\Controllers;

use App\Key;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function contacts()
    {
        return view('contacts');
    }

    public function getkey()
    {
        return view('getkey');
    }

    public function about()
    {
        return view('about');
    }

    public function feedback()
    {
        return view('give_feedback');
    }

    public function findkey(Request $req)
    {
        $email = strval(strip_tags($req->input('email')));
        $key = Key::getHash($email);

        return view('findkey_output')->with([
            'key' => $key,
        ]);
    }

    public function getKeys()
    {
        $users = Key::getKeys(10);
        return view('top_keys')->with([
            'users' => $users
        ]);
    }

    public function profile($hash)
    {
        $hash = strval($hash);
        $user = Key::getUser($hash);
        return view('profile')->with([
            'user' => $user[0]
        ]);
    }

    public function review()
    {
        return view('review');
    }
}
