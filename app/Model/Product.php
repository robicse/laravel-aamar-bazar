<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function seller()
    {
        return $this->belongsTo('App\Model\Seller', 'user_id');
    }

    public function brand()
    {
        return $this->belongsTo('App\Model\Brand','brand_id');

    }
}
