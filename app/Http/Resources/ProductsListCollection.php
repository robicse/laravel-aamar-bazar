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
                if ($data->variant_product != 0){
                    $unit = ProductUnit($data->id);
                    $price = VariantPrice($data->id);
                }else{
                    $unit = $data->unit;
                    $price = $data->unit_price;
                }
                $discountPrice = 0;
                if (home_base_price($data->id) != home_discounted_base_price($data->id)){
                    $price = home_base_price($data->id);
                    $discountPrice = home_discounted_base_price($data->id);
                }
                if ($data->category->status !=0 || $data->subCategory->status !=0 || $data->subSubCategory->status !=0 || $data->brand->status !=0)

                {
                    return [
                        'id' => $data->id,
                        'shop_id' => $shop->id,
                        'name' => $data->name,
                        'thumbnail_image' => $data->thumbnail_img,
                        'current_stock' =>(integer) $data->current_stock,
                        'unit' => $unit,
                        'base_price' => (double) $price,
                        'base_discounted_price' =>  (double) $discountPrice,
                        'discount' => (double) $data->discount,
                        'discount_type' => $data->discount_type,
                    ];
                }
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
