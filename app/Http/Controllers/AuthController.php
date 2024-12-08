<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function validateAccount(request $request)
    {

        $validation = [
            "name" => $request->name,
            "password" => $request->password
        ];

        if (Auth::attempt($validation)) {
            $id = Auth::user()->id;
            return to_route("myAccount",['id' => $id]);
        } else {

            return to_route("login")->with('error', __('Invalid credentials.'));
        }
    }


    public function logout()
    {

        Session::flush();
        Auth::logout();
        return to_route("login");
    }
}
