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
            background-color: #fcb800;
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
                            <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12  ">
                                <div class="ps-form__billing-info">
                                    <h3 class="ps-form__heading">Billing Details</h3>
                                    <div class="form-group">
                                        <label>Name<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control" type="text" name="name" value="{{Auth::user()->name}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Email Address<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control" type="email" name="email" value="{{Auth::user()->email}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control" type="number" name="phone" value="{{Auth::user()->phone}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Address<sup>*</sup>
                                        </label>
                                        <div class="form-group__content">
                                            <input class="form-control" type="text" name="address" value="{{Auth::user()->address}}">
                                        </div>
                                    </div>
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
                                    <h3 class="mt-40"> Addition information</h3>
                                    <div class="form-group">
                                        <label>Order Notes</label>
                                        <div class="form-group__content">
                                            <textarea class="form-control" rows="7" name="note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-4 col-md-12 col-sm-12  ">
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
@endsection
