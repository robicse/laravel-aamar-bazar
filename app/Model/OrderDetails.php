<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $guarded = [];

    public function order()
    {
        return $this->hasMany('App\Model\Order', 'order_id');
    }
}
