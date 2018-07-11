<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'inventory';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'inventoryid', 'english', 'vietnamese', 'image', 'file', 'content', 'fullpath', 'idmb', 'year',' director','resolution', 'feedback','categoryid', 'globalid', 'file_720','file_1080', 'isadd', 'trailer', 'created'
    ];
   
    public $timestamps = false;
}
