<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ShopCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function($data) {
                return [
                    'id' =>(integer) $data->id,
                    'user_id' =>(integer) $data->user_id,
                    'seller_id' =>(integer) $data->seller_id,
                    'status' =>(integer) $data->seller->verification_status,
                    'about' => $data->about,
                    'name' => $data->name,
                    'logo' => $data->logo,
                    'address' => $data->address,
                    'area' => $data->area,
                    'city' => $data->city,
                    'latitude' => $data->latitude,
                    'longitude' => $data->longitude,
                    'slug' => $data->slug,

                    'shipping_time' => $data->shipping_time,
                    'pick_up_point_id' => $data->pick_up_point_id,
                    'shipping_cost' =>(double) $data->shipping_cost,
                    'rating' =>(float) getShopRatings($data->id),

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
