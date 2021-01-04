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
    public function category()
    {
        return $this->belongsTo('App\Model\Category', 'category_id');
    }
    public function stocks(){
        return $this->hasMany("App\Model\ProductStock",'product_id');
    }
}
