<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Glo extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'global';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'globalid', 'name'
    ];
   
    public $timestamps = false;
}
