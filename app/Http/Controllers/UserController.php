<?php

namespace App\Http\Controllers;

use App\User;
use App\Entry;
use DB;
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
        return redirect()->route('home');
    }

    public function postSignin(Request $request){
        if ( 
            Auth::attempt([
                'email' => $request['email'], 
                'password' => $request['password'],
                ])
            )
        {
            return redirect()->route('home');
        }
        else
        {
            return redirect()->back();
        }
    }

    public function getSignout(Request $request)
    {
        if ( Auth::check() ) 
        {
            Auth::logout();
            $request->session()->flush();
            return redirect()->route('home');
        }
    }
    public function getProfile()
    {
        return view('user.profile');
    }

    public function getHome()
    {
        $entries = Entry::orderBy('created_at','desc')->paginate(5);
        return view('home',['entries' => $entries]);
    }
}
