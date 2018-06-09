<?php

namespace App\Http\Middleware;

use Closure;
use App\UserService;
use App\Role;
use App\Customer;

class AdminMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $value = $request->cookie('username');
        error_log('=====>> VALUE::: '.$value);
        
        if(empty($value)){
            return redirect('/redirect/404');
        }
        else{
            //get user is admin:
            $user = UserService::getUserByUserName($value);
            if(empty($user)){
                return redirect('/redirect/404');
            }
            else{
                //check role admin:
                $role = Role::where('user_id', $user->user_id)->first();
                if(empty($role)){
                    return redirect('/redirect/404');
                }
                else{
                    error_log('=====>> ROLE NAME::: '.$role->name);
                    if($role->name != 'admin'){
                        error_log('=====ROLE IS NOT ADMIN');
                        return redirect('/redirect/404');
                    }
                }
            }
            return $next($request);
        }
    }
}
