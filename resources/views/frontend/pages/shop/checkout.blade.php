@extends('frontend.layouts.master')
@section('title', 'Checkout')
@push('css')
    <style>
        [type=radio] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }
        /* IMAGE STYLES */
        /*[type=radio] + img {*/
        /*    cursor: pointer;*/
        /*}*/
        [type=radio] + label {
            cursor: pointer;
            padding: 10px 10px;
            background-color: #fff87a;
            color: #000000;
            border-radius: 6px;
        }

        /* CHECKED STYLES */
        /*[type=radio]:checked + img {*/
        /*    background-color: #f00;*/
        /*    outline: 2px solid #f00;*/
        /*    border-radius: 10px;*/
        /*}*/
        [type=radio]:checked + label {
            border: 2px solid #282727;
            color: #212121;
        }
    </style>
@endpush
@section('content')
    <div class="ps-page--simple">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>Checkout</li>
                </ul>
            </div>
        </div>
        <div class="ps-checkout ps-section--shopping">
            <div class="container">
                <div class="ps-section__content">
                    <form class="ps-form--checkout" action="{{route('checkout.order.submit')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12  ">
                                <div class="ps-form__billing-info">
                                    <h3 class="ps-form__heading">Shipping Details</h3>
                                    <div class="row">
                                        @if(!empty($addresses))
                                            @foreach($addresses as $address)
                                                <div class="col-md-6 col-12" style="padding-bottom: 15px;">
                                                    <div class="card" style="width: 35rem;">
{{--                                                        <div class="">--}}
{{--                                                            <form action="">--}}
{{--                                                                @csrf--}}
{{--                                                                    <input type="radio" name="pay" id="ssl" value="ssl" style="background: red;">--}}
{{--                                                            </form>--}}
{{--                                                        </div>--}}
                                                        <div class="text-right dropdown">
                                                            <button class="btn bg-black" type="button" id="dropdownMenuButton" data-toggle="dropdown" style="background: #f1f1f1;">
                                                                <i class="fa fa-ellipsis-v"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="font-size: 14px;">
                                                                @if($address->set_default == 0)
                                                                    <form action="{{route('user.update.status',$address->id)}}" method="POST">
                                                                        @csrf
                                                                        <button class="btn btn-lg"> Make Default</button>
                                                                    </form>
                                                                @endif
                                                                <form action="{{route('user.address.destroy',$address->id)}}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn btn-lg"><a class="dropdown-item"> Delete </a></button>
                                                                </form>
                                                            </div>
                                                        </div>

                                                        <div class="card-body">
                                                            <div class="card-text">Address: <strong>{{$address->address}}</strong></div>
                                                            <div class="card-text">Postal Code: <strong>{{$address->postal_code}}</strong></div>
                                                            <div class="card-text">City: <strong>{{$address->city}}</strong></div>
                                                            <div class="card-text">Country: <strong>{{$address->country}}</strong></div>
                                                            <div class="card-text">Phone: <strong>{{$address->phone}}</strong>
                                                                @if($address->set_default == 1)
                                                                    <a href="#" class="btn btn-primary" style="margin-left: 100px;">Default</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="col-md-6 col-12" style="padding-bottom: 15px;">
                                                <div class="card" style="width: 35rem; height: 12rem;">
                                                    <div class="card-body">
                                                        <h3 class="text-center">
                                                            <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-plus"></i></a>
                                                            <p>Add new Address</p>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-md-6 col-12">
                                                <div class="card" style="width: 30rem; height: 12rem;">
                                                    <div class="card-body">
                                                        <h3 class="text-center">
                                                            <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-plus"></i></a>
                                                            <p>Add new Address</p>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    {{--                                    <div class="form-group">--}}
                                    {{--                                        <label>Name<sup>*</sup>--}}
                                    {{--                                        </label>--}}
                                    {{--                                        <div class="form-group__content">--}}
                                    {{--                                            <input class="form-control" type="text" name="name" value="{{Auth::user()->name}}">--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    {{--                                    <div class="form-group">--}}
                                    {{--                                        <label>Email Address<sup>*</sup>--}}
                                    {{--                                        </label>--}}
                                    {{--                                        <div class="form-group__content">--}}
                                    {{--                                            <input class="form-control" type="email" name="email" value="{{Auth::user()->email}}">--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    {{--                                    <div class="form-group">--}}
                                    {{--                                        <label>Phone<sup>*</sup>--}}
                                    {{--                                        </label>--}}
                                    {{--                                        <div class="form-group__content">--}}
                                    {{--                                            <input class="form-control" type="number" name="phone" value="{{Auth::user()->phone}}">--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    {{--                                    <div class="form-group">--}}
                                    {{--                                        <label>Address<sup>*</sup>--}}
                                    {{--                                        </label>--}}
                                    {{--                                        <div class="form-group__content">--}}
                                    {{--                                            <input class="form-control" type="text" name="address" value="{{Auth::user()->address}}">--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    {{--                                    <div class="form-group">--}}
                                    {{--                                        <div class="ps-checkbox">--}}
                                    {{--                                            <input class="form-control" type="checkbox" id="create-account">--}}
                                    {{--                                            <label for="create-account">Create an account?</label>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    {{--                                    <div class="form-group">--}}
                                    {{--                                        <div class="ps-checkbox">--}}
                                    {{--                                            <input class="form-control" type="checkbox" id="cb01">--}}
                                    {{--                                            <label for="cb01">Ship to a different address?</label>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    {{--                                    <h3 class="mt-40"> Addition information</h3>--}}
                                    {{--                                    <div class="form-group">--}}
                                    {{--                                        <label>Order Notes</label>--}}
                                    {{--                                        <div class="form-group__content">--}}
                                    {{--                                            <textarea class="form-control" rows="7" name="note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12  ">
                                <div class="ps-form__total">
                                    <h3 class="ps-form__heading">Your Order</h3>
                                    <div class="content">
                                        <div class="ps-block--checkout-total">
                                            <div class="ps-block__header">
                                                <p>Products</p>
                                            </div>
                                            <div class="ps-block__content">
                                                <table class="table ps-block__products">
                                                    <tbody>
                                                    @foreach(Cart::content() as $product)
                                                        <tr>
                                                            <td><a href="#"> {{$product->name}} ×{{$product->qty}}</a>
                                                                <p>Sold By:<strong>{{$product->options->shop_name}}</strong></p>
                                                            </td>
                                                            <td>৳{{$product->subtotal()}}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                <h4 class="ps-block__title">Subtotal <span>৳{{Cart::subtotal()}}</span></h4>
                                                <h3>Total <span>৳{{Cart::total()}}</span></h3>
                                            </div>
                                            <div class="row my-3">
                                                <div class="col-md-12 text-center">
                                                    <div class="form-check form-check-inline mr-0">
                                                        <input class="form-check-input" type="radio" name="pay" id="cod" value="cod" checked autocomplete="off">
                                                        <label class="form-check-label" for="cod" style="">
                                                            Pay Later
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline mr-0">
                                                        <input class="form-check-input" type="radio" name="pay" id="ssl" value="ssl" checked autocomplete="off">
                                                        <label class="form-check-label" for="ssl" style="">
                                                            Pay Now
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><button class="ps-btn ps-btn--fullwidth" >Submit Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Your Address</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="ps-form--account-setting" action="{{route('user.address.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="ps-form__content" style="padding-left: 50px; padding-top: 20px;">
                            {{--                                    <div class="form-group row">--}}
                            {{--                                        <label class="col-md-2">Address</label>--}}
                            {{--                                        <input class="form-control col-md-4" type="text" name="address" placeholder="Your Address">--}}
                            {{--                                    </div>--}}
                            <div class="form-group row">
                                <label for="address" class="col-sm-2">Address</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" name="address" placeholder="Your Address">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="country" class="col-sm-2">Country</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" name="country" placeholder="Bangladesh" {{'Bangladesh' ? 'readonly' : ''}}>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="city" class="col-sm-2">City</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" name="city" placeholder="Your City">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="postal_code" class="col-sm-2">Postal Code</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" name="postal_code" placeholder="Your Postal Code">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-sm-2">Phone</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" name="phone" placeholder="Your phone">
                                </div>
                            </div>

                        </div>
                        <div class="form-group submit" style="padding-left: 125px;" >
                            <button class="ps-btn">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
