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
                    'id' => $data->id,
                    'user_id' => $data->user_id,
                    'seller_id' => $data->seller_id,
                    'about' => $data->about,
                    'name' => $data->name,
                    'logo' => $data->logo,
                    'sliders' => json_decode($data->sliders),
                    'address' => $data->address,
                    'area' => $data->area,
                    'city' => $data->city,
                    'latitude' => $data->latitude,
                    'longitude' => $data->longitude,
                    'slug' => $data->slug,

                    'shipping_time' => $data->shipping_time,
                    'pick_up_point_id' => $data->pick_up_point_id,
                    'shipping_cost' => $data->shipping_cost,
                    'rating' => getShopRatings($data->id),

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
