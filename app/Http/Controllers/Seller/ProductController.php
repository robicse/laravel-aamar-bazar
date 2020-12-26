<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Helpers;
use App\Model\Brand;
use App\Model\Category;
use App\Model\Color;
use App\Model\Product;
use App\Model\ProductStock;
use App\Model\Shop;
use App\Model\ShopCategory;
use App\Model\Subcategory;
use App\Model\SubSubcategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('user_id',Auth::id())->latest()->get();
        return view('backend.seller.products.index',compact('products'));
    }
    public function ajaxSlugMake($name)
    {
        $data = Str::slug($name);
        return response()->json(['success'=> true, 'response'=>$data]);
    }
    public function ajaxSubCat (Request $request)
    {
        $subcategories = Subcategory::where('category_id', $request->category_id)->get();
        return $subcategories;
    }
    public function ajaxSubSubCat(Request $request)
    {
        $subsubcategories = SubSubcategory::where('sub_category_id', $request->subcategory_id)->get();
        return $subsubcategories;
    }
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('backend.seller.products.create',compact('categories','brands'));
    }
    public function sku_combination(Request $request)
    {
        //dd($request->all());
        $options = array();
        if($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0){
            $colors_active = 1;
            array_push($options, $request->colors);
        }
        else {
            $colors_active = 0;
        }

        $unit_price = $request->unit_price;
        $product_name = $request->name;

        if($request->has('choice_no')){
            foreach ($request->choice_no as $key => $no) {
                $name = 'choice_options_'.$no;
                $my_str = implode('', $request[$name]);
                array_push($options, explode(',', $my_str));
            }
        }

        $combinations = Helpers::combinations($options);
        return view('backend.partials.sku_combinations', compact('combinations', 'unit_price', 'colors_active', 'product_name'));
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $product = new Product;
        $product->name = $request->name;
        $product->added_by = $request->added_by;
        $product->user_id = Auth::id();
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->subsubcategory_id = $request->subsubcategory_id;
        $product->brand_id = $request->brand_id;
        $product->current_stock = $request->current_stock;
        $product->current_stock = $request->current_stock;
        $photos = array();
        if($request->hasFile('photos')){
            foreach ($request->photos as $key => $photo) {
                $path = $photo->store('uploads/products/photos');
                array_push($photos, $path);
                //ImageOptimizer::optimize(base_path('public/').$path);
            }
            $product->photos = json_encode($photos);
        }

        if($request->hasFile('thumbnail_img')){
            $product->thumbnail_img = $request->thumbnail_img->store('uploads/products/thumbnail');
            //ImageOptimizer::optimize(base_path('public/').$product->thumbnail_img);
        }

        $product->unit = $request->unit;
        //$product->min_qty = $request->min_qty;
        //$product->tags = implode('|',$request->tags);
        $product->description = $request->description;
        //$product->video_provider = $request->video_provider;
        $product->video_link = $request->video_link;
        $product->unit_price = $request->unit_price;
        $product->purchase_price = $request->purchase_price;
        //$product->tax = $request->tax;
        //$product->tax_type = $request->tax_type;
        $product->discount = $request->discount;
        $product->discount_type = $request->discount_type;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->slug = $request->slug.'-'.Str::random(5);

        if($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0){
            $data = Array();
            foreach ($request->colors as $color){
                $colorName = Color::where('code',$color)->first();
                $color_item['name'] = $colorName->name;
                $color_item['code'] = $color;
                array_push($data, $color_item);
            }
            $product->colors = json_encode($data);
        }
        else {
            $colors = array();
            $product->colors = json_encode($colors);
        }
        //choice option data
        $choice_options = array();
        if($request->has('choice_no')){
            foreach ($request->choice_no as $key => $no) {
                $str = 'choice_options_'.$no;

                $item['attribute_id'] = $no;
                $item['values'] = explode(',', implode('|', $request[$str]));

                array_push($choice_options, $item);
            }
        }

        if (!empty($request->choice_no)) {
            $product->attributes = json_encode($request->choice_no);
        }
        else {
            $product->attributes = json_encode(array());
        }
        $product->choice_options = json_encode($choice_options);

        $product->save();

        //combinations start
        $options = array();
        if($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0){
            $colors_active = 1;
            array_push($options, $request->colors);
        }

        if($request->has('choice_no')){
            foreach ($request->choice_no as $key => $no) {
                $name = 'choice_options_'.$no;
                $my_str = implode('|',$request[$name]);
                array_push($options, explode(',', $my_str));
            }
        }

        //Generates the combinations of customer choice options
        $combinations = Helpers::combinations($options);
        if(count($combinations[0]) > 0){
            dd('inside seller controller after');
            $product->variant_product = 1;
            foreach ($combinations as $key => $combination){
                $str = '';
                foreach ($combination as $key => $item){
                    if($key > 0 ){
                        $str .= '-'.str_replace(' ', '', $item);
                    }
                    else{
                        if($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0){
                            $color_name = \App\Model\Color::where('code', $item)->first()->name;
                            $str .= $color_name;
                        }
                        else{
                            $str .= str_replace(' ', '', $item);
                        }
                    }
                }
                // $item = array();
                // $item['price'] = $request['price_'.str_replace('.', '_', $str)];
                // $item['sku'] = $request['sku_'.str_replace('.', '_', $str)];
                // $item['qty'] = $request['qty_'.str_replace('.', '_', $str)];
                // $variations[$str] = $item;

                $product_stock = ProductStock::where('product_id', $product->id)->where('variant', $str)->first();
                if($product_stock == null){
                    $product_stock = new ProductStock;
                    $product_stock->product_id = $product->id;
                }

                $product_stock->variant = $str;
                $product_stock->price = $request['price_'.str_replace('.', '_', $str)];
                $product_stock->sku = $request['sku_'.str_replace('.', '_', $str)];
                $product_stock->qty = $request['qty_'.str_replace('.', '_', $str)];
                $product_stock->save();
            }
            //combinations end
            $product->save();
            Toastr::success("Product Inserted Successfully","Success");
            return redirect()->route('seller.products.index');
        }
        //check shop categories
        $shopId = Shop::where('user_id',Auth::id())->first();
        //dd($shopId);
        $shopCategory = ShopCategory::where('shop_id',$shopId->id)->where('category_id',$request->category_id)->first();
        if(empty($shopCategory)){
            $shopCategoryData = new ShopCategory();
            $shopCategoryData->shop_id = $shopId->id;
            $shopCategoryData->category_id = $request->category_id;
            Toastr::success("Shop Category Inserted Successfully","Success");
            $shopCategoryData->save();
        }
        $product->save();
        Toastr::success("Product Inserted Successfully","Success");
        return redirect()->route('seller.products.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
    //today's deals update
    public function updateTodaysDeal(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->todays_deal = $request->status;
        if($product->save()){
            return 1;
        }
        return 0;
    }
    //product published
    public function updatePublished(Request $request)
    {
        //return 'ok';
        $product = Product::find($request->id);
        $product->published = $request->status;
        if($product->save()){
            return 1;
        }
        return 0;
    }
    //featured product status updated
    public function updateFeatured(Request $request)
    {
        $product = Product::find($request->id);
        $product->featured = $request->status;
        if($product->save()){
            return 1;
        }
        return 0;
    }
    public function getAdminProductAjax()
    {
        $products = Product::latest()->select('id','name','unit_price')->get()->toArray();;
        $alldata = array();
        foreach($products as $single){
            $alldata[] = array(
                (string)$single['id'],
                $single['name'],
                (string)$single['unit_price']
            );
        }
        $Response = array('data' => $alldata );
        return response()->json($Response);
    }
    public function getAdminProduct()
    {
        return view('backend.seller.products.product_list_form_admin');
    }
    public function getAdminProductStore(Request $request)
    {
        foreach ($request->id as $data){
            $product = Product::find($data);
            $product_new = $product->replicate();
            $product_new->added_by = 'seller';
            $product_new->user_id = Auth::id();
            $product_new->slug = substr($product_new->slug, 0, -5).Str::random(5);
            $product_new->save();

        }
        Toastr::success('Product Successfully Copied!');
        return redirect()->back();
    }
}
