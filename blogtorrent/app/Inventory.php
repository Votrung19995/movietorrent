<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Inventory extends Model
{
    use Sluggable;
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
        'inventoryid', 'id', 'english', 'vietnamese', 'image', 'file', 'content', 'fullpath', 'idmb', 'year',' director','production','resolution', 'feedback','categoryid', 'globalid','lenght','file_720','file_1080', 'isadd', 'link', 'stream','stream2','slug', 'trailer','count', 'created'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'vietnamese'
            ]
        ];
    }
   
    public $timestamps = false;
}
