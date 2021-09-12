<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public function district()
    {
        return $this->belongsTo('App\Model\District', 'district_id');
    }
}
