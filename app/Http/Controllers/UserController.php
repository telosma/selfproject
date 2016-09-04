<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function postSignup(SignupRequest $request)
    {
    	$email = $request['email'];
        $name = $request['name'];
        $password = bcrypt($request['password']);

        $user = new User();
        $user->email = $email;
        $user->name = $name;
        $user->password = $password;

        $user->save();
        Auth::login($user);
        return redirect()->route('welcome');
    }
}
