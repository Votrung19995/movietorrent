<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserService;
use Cookie;
use App\Customer;
use App\Role;
use Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Socialite;

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
              $role = Role::where('user_id',$user->user_id)->first();
              if(empty($role)){
                  //set into model:
                 $user = new Customer;
                 $user->username = $username;
                 $user->password = $password;
                 //forget session for user:
                 $err = '401 không có quyền truy cập';
                 //set session for user:
                 session(['err'=>$err]);
                 return view('login');
              }
              else{
                  //forget session for user:
                  session()->forget('err');
                  if($role->name == 'admin'){
                      error_log('=====>> IS ADMIN::: '.$role->name);
                      //set cookie:
                      return Redirect::to('/admin/home')->withCookie(Cookie::make('username',$user->username,60))->withCookie(Cookie::make('check','admin',60));
                  }
                  else{
                      //set cookie:
                      return Redirect::to('/')->withCookie(Cookie::make('username',$user->username,60));
                  }
              }
           }
           else{
              //set into model:
              $user = new Customer;
              $user->username = $username;
              $user->password = $password;
              $err = 'Tên đăng nhập hoặc mật khẩu không đúng !';
              //set session for user:
              session(['err'=>$err]);
              return Redirect::to('login');
           }
        }
        else{
              //set into model:
              $user = new Customer;
              $user->username = $username;
              $user->password = $password;
              $err = 'Tên đăng nhập hoặc mật khẩu không đúng !';
              //set session for user:
              session(['err'=>$err]);
              return Redirect::to('login');
        }
        
    }

    public function redirectToProvideGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallbackGoogle(){
        $user = Socialite::driver('google')->user();
        //check username as getName:
        if(!empty($user)){
            $username = $user->getName();
            $userDB = UserService::getUserByUserName($username);
            
            if(empty($userDB)){
                //save user into DB:
                $userSave = new Customer;
                $userSave->username = $user->getName();
                $userSave->email = $user->getEmail();
                //hasing password:
                $hasshedPassword = Hash::make('google');
                $userSave->password = $hasshedPassword;
                $userSave->save();
            }
            
            //login witch google susscess:
            //set cookie:
            return Redirect::to('/')->withCookie(Cookie::make('username',$user->getName(),60));
        }
        else{
            return redirect('/redirect/404');
        }
    }

    //Log out user
    public function logOut(){
      //set cookie:
      sleep(1);
      return Redirect::to('/')->withCookie(Cookie::forget('username'))->withCookie(Cookie::forget('check'));
    }
}
