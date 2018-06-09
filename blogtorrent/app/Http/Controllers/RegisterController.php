<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\UserService;
use App\Role;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Cookie;
use Redirect;

class RegisterController extends Controller
{
    //go register:
    public function goRegister(){
        $err = "";
        $user = new Customer;
        return view('register')->with(array('error' =>$err,'user' => $user));
    }

    //register:
    public function acceptRegister(){
        $err = "";
        $user = new Customer;
        $username = Input::get('username');
        $password = Input::get('password');
        $phone = Input::get('phone');
        $email = Input::get('email');
        $address = Input::get('address');
        //hasing password:
        $hasshedPassword = Hash::make($password);
        //set into model:
        $user = new Customer;
        $user->username = $username;
        $user->password = $hasshedPassword;
        $user->phone = $phone;
        $user->email = $email;
        $user->address = $address;

        //check User exist:
        if(UserService::checkUserIsExist($username)){
            $user->password = '';
            return view('register')->with(array('error' => $username.' đã tồn tại, vui lòng nhập tên khác!','user' => $user));
        }
        else{
            //saving value
            $saved = $user->save();

            if($saved == true){
            //get user by username:
            $userSaved = UserService::getUserByUserName($username);

                if(empty($userSaved)){
                    $user->password = '';
                    return view('register')->with(array('error' => 'Lỗi đăng ký!','user' => $user));
                }
                else{
                     //set role:
                    $role = new Role;
                    $role->user_id = $userSaved->user_id;
                    $role->name = 'guest';
                    $role->save();
                }
                //set cookie:
                return Redirect::to('/redirect/success')->withCookie(Cookie::make('isRegister','true',1));
            }
            else{
                $user->password = '';
                return view('register')->with(array('error' => 'Lỗi đăng ký!','user' => $user));
            }
        }

        return view('register')->with(array('error' =>$err,'user' => $user));
    }
}
