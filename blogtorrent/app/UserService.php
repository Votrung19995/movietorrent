<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Customer;

class UserService extends Model
{
    //get user by username:
    public static function getUserByUserName($username){
        //get user by username:
        $user = Customer::where('username', $username)->first();
        return $user;
    }

    //check user is Exist:
    public static function checkUserIsExist($username){
        $user = Customer::where('username', $username)->first();
        if(!empty($user)){
            return true;
        }
        return false;
    }
}
