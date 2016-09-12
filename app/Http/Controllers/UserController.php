<?php

namespace App\Http\Controllers;

use App\User;
use App\Entry;
use App\FollowEvent;
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
    public function getProfile(Request $request,$user_id)
    {   
        $followed = false;
        if (Auth::check()){
            $followed = FollowEvent::checkFollowed($user_id, $request->user()->id);  
        }      
            $userInfo =  User::getInfo($user_id);
            $userInfo->numEntry = Entry::countEntry($user_id);
            $userInfo->numFollowing = FollowEvent::countFollowing($user_id);
            $userInfo->numFollower = FollowEvent::countFollower($user_id);

            return view('user.profile',['user_id' => $user_id, 'userInfo' => $userInfo, 'followed' => $followed ]);
        
    }

    public function getHome()
    {
        $entries = Entry::orderBy('created_at','desc')->paginate(5);
        return view('home',['entries' => $entries]);
    }

    public function postFollowUser(Request $request)
    {   
        if ( Auth::check() )
        {
            $followed = FollowEvent::checkFollowed($request->follower_id, $request->user()->id);
            if ( !$followed )
            {
                $followevent = new FollowEvent;
                $followevent->follower_id = $request->follower_id;
                $followevent->following_id = $request->user()->id;
                        if ($followevent->save())
                        {
                            return redirect()->back();
                        }
                abort(404);
            }
        }
        else
        {
            return redirect()->route('signin');
        }
        
    }

    public function postUnFollow(Request $request)
    {   
        if( Auth::check() )
        {
            $following_id = $request->user()->id;
            $relation = FollowEvent::where('follower_id', $request->follower_id)->where('following_id', $following_id)->first();
            $relation->delete();
            return redirect()->back();
        }
        else
        {
            return redirect()->route('signin');
        }
    }
}
