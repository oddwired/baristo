<?php

namespace Baristo;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'title'
    ];

    function items(){
        return $this->hasMany('Baristo\Item', 'category_id');
    }
}
