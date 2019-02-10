<?php

namespace Baristo;

use Illuminate\Database\Eloquent\Model;

class Subitem extends Model
{
    protected $table = 'sub_items';
    protected $fillable = [
        'item_id', 'title', 'price'
    ];

    function item(){
        return $this->belongsTo('Baristo\Item', 'item_id');
    }
}
