<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ShippingAddressCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function($data) {
                return [
                    'id' =>(integer) $data->id,
                    'area' => $data->Area->name,
                    'city' => $data->district->name,
                    'address' => $data->address,
                    'phone' => $data->phone,
                    'address_type' => $data->type,
                    'set_default' =>(integer) $data->set_default,
                ];
            })
        ];
    }

    public function with($request)
    {
        return [
            'success' => true,
            'status' => 200
        ];
    }
}
