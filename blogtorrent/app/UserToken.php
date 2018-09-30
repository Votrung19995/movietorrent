<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserToken extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_token';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','access_token', 'app_id', 'app_secret', 'prefix_server'
    ];
   
    public $timestamps = false;
}
