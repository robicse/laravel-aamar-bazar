@extends('frontend.layouts.master')
@section('title', 'Checkout')
@push('css')
    <style>
        .form_height{
            height: 40px;
        }
    </style>
    <style>
        [type=radio] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }
        [type=radio] + label {
            cursor: pointer;
            padding: 10px 10px;
            background-color: #fff;
            color: #000000;
            border-radius: 6px;

        }
        [type=radio]:checked + label {
            background: #fcb800;
            color: #212121;
        }
        .select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #aaa;
            border-radius: 4px;
            height: 50px!important;
        }
        .select2-search--dropdown .select2-search__field {
            margin: 5px 0;
            width: 100%;
            box-sizing: border-box;
            height: 40px!important;
        }
        .select2 .select2-selection--single .select2-selection__arrow:before {
            content: '\f107';
            font-family: FontAwesome;
            position: absolute;
            top: 150%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .select2-container .select2-selection--single .select2-selection__rendered {
            display: block;
            margin-left: 15px;
            padding-right: 20px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .select2-container .select2-results li {
            color: #212529;
        }
    </style>
    <link rel="stylesheet" href="{{asset('backend/plugins/select2/select2.min.css')}}">
@endpush
@section('content')
    <div class="ps-page--simple">
        <div class="ps-breadcrumb" style="background: #fff;">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>Checkout</li>
                </ul>
            </div>
        </div>
        <div class="ps-checkout ps-section--shopping" style="background: #f3f3f3;">
            <div class="container">
                <div class="ps-section__content">
                    <form class="ps-form--checkout" action="{{route('checkout.order.submit')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name" class="">Name <small class="text-danger">(You can change delivery name)</small></label>
                                    <input type="text" class="form-control form_height form-control-sm" name="name" value="{{Auth::user()->name}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12  ">
                                    <div class="ps-form__billing-info">
                                        <h3 class="ps-form__heading">Shipping Details</h3>
                                        <div class="row">
                                            @if($addresses->count() != 0)
                                                @foreach($addresses as $address)
                                                    <div class="col-md-6 col-12" style="padding-bottom: 15px;">
                                                        <div class="card" style="width: 35rem;">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="ps-radio col-10">
                                                                        <input class="form-check-input" type="radio" name="address_id" id="{{$address->id}}" value="{{$address->id}}" {{$address->set_default == 1 ? 'checked' : ''}}>
                                                                        <label class="form-check-label" for="{{$address->id}}" style="background: #f3f3f3; color: #f3f3f3;">
                                                                        </label>
                                                                    </div>
{{--                                                                    <div class="col-2">--}}
{{--                                                                        <button class="btn bg-black" type="button" id="dropdownMenuButton" data-toggle="dropdown" style="">--}}
{{--                                                                            <i class="fa fa-ellipsis-v"></i>--}}
{{--                                                                        </button>--}}
{{--                                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="font-size: 14px;">--}}
{{--                                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal-2">Edit</a>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
                                                                </div>
                                                                <div class="card-text">Area: <strong>{{$address->Area->name}}</strong></div>
                                                                <div class="card-text">Address: <strong>{{$address->address}}</strong></div>
                                                                <div class="card-text">City: <strong>{{$address->district->name}}</strong></div>
                                                                <div class="card-text">Phone: <strong>{{$address->phone}}</strong>  </div>
                                                                <div class="card-text">Address Type: <strong>{{$address->type}}</strong>
                                                                </div>
                                                                <div class="float-right">
                                                                <a class="btn btn-info" href="#" onclick="edit_address('{{$address->id}}');" data-toggle="modal" data-target="#exampleModal-2">Edit</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
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
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $order = \App\Model\Order::where('user_id',Auth::id())->first();

                                    $offer = \App\Model\BusinessSetting::where('type','first_order_discount')->first();
                                @endphp
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
                                                        @php $totalVat = 0.00; $totalLabourCost = 0.00@endphp
                                                        @foreach(Cart::content() as $product)
                                                            @php
                                                                $totalVat +=  $product->options->vat * $product->qty;
                                                                $totalLabourCost +=  $product->options->labour_cost * $product->qty;
                                                            @endphp
                                                            <tr style="border-bottom: 1px solid #ddd;">
                                                                <td>
                                                                    <a href="#"> {{$product->name}} ×{{$product->qty}}</a>
                                                                    {{--                                                                <div>VAT:<strong class="text-dark"> ৳{{$product->options->vat * $product->qty}}</strong></div>--}}
                                                                    @if($totalLabourCost > 0)
                                                                        <div>Labour Cost:<strong class="text-dark"> ৳{{$product->options->labour_cost * $product->qty}}</strong></div>
                                                                    @endif

                                                                </td>
                                                                <td >Subtotal: ৳{{$product->subtotal()}}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                    {{--                                                <h4 class="ps-block__title">Total VAT: <span>৳{{$totalVat}}</span></h4>--}}
                                                    <h4 >Deliver Charge: <b>Free</b></h4>
                                                    <h4 class="ps-block__title">Subtotal: <span>৳{{Cart::subtotal()}}</span></h4>

                                                    @if(empty($order))
                                                        <h4 class="ps-block__title">Discount: <span>৳{{$offer->value}}</span></h4>
                                                        <h3>Total: <small style="font-size: 14px;">(Incl. VAT)</small><span>৳{{(Cart::subtotal() +$totalVat + $totalLabourCost) - $offer->value}}</span></h3>
                                                    @else
                                                        <h3>Total <small style="font-size: 14px;">(Incl. VAT)</small>: <span>৳{{Cart::subtotal() + $totalVat + $totalLabourCost}}</span></h3>
                                                    @endif

                                                </div>
                                                <div class="row my-3" style="padding-top: 10px; padding-bottom: 10px;">
                                                    <div class="col-md-12 text-center">
                                                        <div class="form-check form-check-inline mr-0">
                                                            <input class="form-check-input" type="radio" name="pay" id="cod" value="cod" checked autocomplete="off" >
                                                            <label class="form-check-label" for="cod" style="">
                                                                Cash On Delivery
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><button class="ps-btn ps-btn--fullwidth" >Submit Order</button>
                                        </div>
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
                    <h5 class="modal-title" id="exampleModalLabel">Create New Shipping Address</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form class="ps-form--account-setting" id="bk_address" action="{{route('user.address.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        @php
                        $districts = \App\Model\District::all();
                        @endphp
                        <div class="form-group m-2">
                            <label for="district_id" class="">District</label>
                            <select name="district_id" id="district_id" class="form_height form-control select2" style="width: 100%;" required>
                                <option value="">Select District</option>
                                @foreach($districts as $district)
                                    <option value="{{$district->id}}">{{$district->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group m-2">
                            <label for="area" class="">Area</label>
                            <select name="area_id" id="area" class="form_height form-control select2" style="width: 100%;" required>
                                <option value="">Select Area</option>

                            </select>
                        </div>
                        <div class="form-group m-2">
                            <label for="phone" class="">Phone</label>
                            <input type="text" class="form-control form_height form-control-sm" name="phone" placeholder="Your phone">
                        </div>
                        <div class="form-group m-2">
                            <label for="phone" class="">Address</label>
                            <textarea name="address" id="address" rows="3" placeholder="Enter Your Address" class="form-control"></textarea>
                            <small class="text-info"><i class="fa fa-info-circle"></i> e.g. 4th Floor, BBTOA Building,9 No South, Mirpur Rd</small>
                        </div>
                        <div class="form-group m-2">
                            <label for="phone" class="">Address Type</label>
                            <select name="type" id="type" class="form_height form-control select2" style="width: 100%;" required>
                                <option value="Home">Home</option>
                                <option value="Office">Office</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-group submit text-center">
                        <button class="ps-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit_address_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-content">

            </div>
        </div>
    </div>



@endsection
@push('js')
    <script src="{{asset('backend/plugins/select2/select2.full.min.js')}}"></script>
    <script>
        $('.select2').select2();
    </script>
    <script>
        $('#district_id').change(function (){
            var district_id = $('#district_id').val();
            console.log(district_id)
            $.post('{{ route('get-areas') }}', {
                _token: '{{ csrf_token() }}',
                district_id: district_id
            }, function (data) {
                $('#area').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#area').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
            });
        });

        function edit_address(id){
            $.post('{{ route('user.address-edit.modal') }}',{_token:'{{ @csrf_token() }}', id:id}, function(data){
                $('#edit_address_modal #modal-content').html(data);
                $('#edit_address_modal').modal('show', {backdrop: 'static'});
            });
        }
    </script>

@endpush
