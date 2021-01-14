<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FlashDealProduct extends Model
{
    public function product()
    {
        return $this->belongsTo('App\Model\Product', 'product_id');

    }
}
