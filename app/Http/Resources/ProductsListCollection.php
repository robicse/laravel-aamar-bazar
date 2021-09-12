<?php

namespace App\Http\Resources;

use App\Model\Shop;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductsListCollection extends ResourceCollection
{
    public function toArray($request)
    {
        //return 'products collections';
        return [
            'data' => $this->collection->map(function($data) {
                $shop = Shop::where('user_id',$data->user_id)->first();
                return [
                    'id' => $data->id,
                    'shop_id' => $shop->id,
                    'name' => $data->name,
                    'thumbnail_image' => $data->thumbnail_img,
                    'current_stock' =>(integer) $data->current_stock,
                    'unit' => $data->unit,
                    'base_price' => (double) $data->unit_price,
                    'base_discounted_price' => (double) home_discounted_base_price($data->id),
                    'discount' => (double) $data->discount,
                    'discount_type' => $data->discount_type,

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
