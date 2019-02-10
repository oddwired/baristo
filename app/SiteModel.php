<?php

namespace Baristo;

use Illuminate\Database\Eloquent\Model;

class SiteModel extends Model
{
    protected $table = 'site_data';
    protected $fillable = [
        'content_type'
    ];
}
