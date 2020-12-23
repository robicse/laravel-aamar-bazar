<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function order_details()
    {
        return $this->hasMany('App\Model\OrderDetails', 'order_id');

    }
}
