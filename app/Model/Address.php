<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function district()
    {
        return $this->belongsTo('App\Model\District', 'district_id');
    }
    public function Area()
    {
        return $this->belongsTo('App\Model\Area', 'area_id');
    }

}
