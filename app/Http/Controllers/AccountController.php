<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function details($id)
    {
        $user= User::find($id);
        return view("module/myAccount",compact('user'));
    }

    public function login()
    {

        return view("module/login");
    }

    public function showRegistrationForm()
    {

        return view("module/registrationForm");
    }


    public function newAccount(request $request)
    {

        $request->validate([
            'name' => 'required|unique:users,name',
            'email' => 'required|unique:users,email',
            'password' => 'required'
        ]);
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();
        return to_route("login")->with('success', __('Account created successfully.'));
    }


    public function delete($id) {
        $user = User::find($id);
        $user->delete();
        return to_route('login')->with('success', __('Account deleted successfully.'));
    }

    public function update(request $request,$id) {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return to_route('myAccount', ['id' => $user->id])->with('success', __('Account edit successfully.'));
    }
}
