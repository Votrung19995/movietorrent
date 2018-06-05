<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserService;
use Cookie;
use App\Customer;
use Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //geo login:
    public function goLogin(){
        $err = "";
        return view('login')->with(array('error'=>$err));
    }

    //auth login
    public function login(){
        $username = Input::get('username');
        $password = Input::get('password');
        //get user from password and username:
        $user = UserService::getUserByUserName($username);
        if(!empty($user)){
           //check password match:
           if (Hash::check($password, $user->password)) {
              
              //set cookie:
              return Redirect::to('/')->withCookie(Cookie::make('username',$user->username,60));
           }
           else{
              //set into model:
              $user = new Customer;
              $user->username = $username;
              $user->password = $password;
              return view('login')->with(array('error' => 'Tên đăng nhập hoặc mật khẩu không đúng !', 'user'=>$user));
           }
        }
        else{
              //set into model:
              $user = new Customer;
              $user->username = $username;
              $user->password = $password;
              
              return view('login')->with(array('error' => 'Tên đăng nhập hoặc mật khẩu không đúng !', 'user'=>$user));
        }
        
    }

    //Log out user
    public function logOut(){
      //set cookie:
      sleep(1);
      return Redirect::to('/')->withCookie(Cookie::forget('username'));
    }
}
