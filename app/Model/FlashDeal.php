<?php

namespace App\Model;

use App\Models\FlashDealProduct;
use Illuminate\Database\Eloquent\Model;

class FlashDeal extends Model
{
    public function flashDealProducts()
    {
        return $this->hasMany('App\Models\FlashDealProduct','flash_deal_id');
    }
}
