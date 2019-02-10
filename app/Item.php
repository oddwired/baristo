<?php

namespace Baristo;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $fillable = [
        'icon', 'category_id', 'title'
    ];

    function category(){
        return $this->belongsTo('Baristo\Category', 'category_id');
    }

    function subitems(){
        return $this->hasMany('Baristo\Subitem', 'item_id');
    }
}
