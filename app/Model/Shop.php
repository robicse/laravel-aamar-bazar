<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $guarded = [];

    public function shopCategories()
    {
        return $this->hasMany('App\Model\ShopCategory','shop_id');
    }
}
