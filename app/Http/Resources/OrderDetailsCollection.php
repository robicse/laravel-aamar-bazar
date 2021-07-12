<?php

namespace App\Http\Resources;
use App\Model\Product;
use App\Model\Shop;
use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderDetailsCollection extends ResourceCollection
{
    public function toArray($request)
    {
        //return 'products collections';
        return [
            'data' => $this->collection->map(function($data) {
                $product = Product::where('id',$data->product_id)->first();
                return [
                    'product_image' => $product->thumbnail_img,
                    'id' => (integer) $data->id,
                    'order_id' => (integer) $data->order_id,
                    'product_id' => (integer) $data->product_id,
                    'variant' => $data->variant,
                    'name' => $data->name,
                    'quantity' =>(integer) $data->quantity,
                    'price' =>(double) $data->price,
                    'base_discounted_price' => (double) home_discounted_base_price($data->product_id),
                    'shipping_cost' =>(double) $data->shipping_cost,
                    'discount' => (double) $data->discount,
                    'sub_total' => ($data->price * $data->quantity) + $data->vat + $data->labour_cost,
                    'created_at' => $data->created_at,
                    'updated_at' => $data->updated_at,
                    'shop_logo' => $data->order->shop->logo,

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
