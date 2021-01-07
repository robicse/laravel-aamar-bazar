@extends('frontend.layouts.master')
@section('title', 'Order History')
@section('content')
    <main class="ps-page--my-account">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="">Account</a></li>
                    <li>Order History</li>
                </ul>
            </div>
        </div>
        <section class="ps-section--account">
            <div class="container">
                <div class="row">
                    @include('frontend.user.includes.user_sidebar')
                    <div class="col-lg-8">
                        <div class="ps-section__right">
                            <div class="ps-section--account-setting">
                                <div class="ps-section__header">
                                    <h3>Order History</h3>
                                </div>
                                <div class="ps-section__content">
                                    <div class="table-responsive">
                                        <table class="table ps-table ps-table--invoices">
                                            <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Invoice</th>
                                                <th>Date</th>
                                                <th>Product Name</th>
                                                <th>Grand Total</th>
                                                <th>Payment Status</th>
                                                <th>Delivery Status</th>
                                                <th>Print</th>
                                                <th>Review</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $key => $order)
                                            <tr>
                                                @php
                                                $review = \App\Model\Review::where('user_id',$order->user_id)->where('product_id',$order->order_details->product_id)->first();
                                                @endphp
{{--                                                @dd($review)--}}
                                                <td>{{$key + 1}}</td>
                                                <td>{{ $order->invoice_code }}</td>
                                                <td>{{date('j-m-Y',strtotime($order->created_at))}}</td>
                                                <td>{{ $order->order_details->name }}</td>
                                                <td>{{ $order->grand_total }}</td>
                                                <td>{{ $order->payment_status }}</td>
                                                <td>{{ $order->delivery_status }}</td>
                                                <td>
                                                    <a href="{{ route('invoice.print',$order->id) }}" target="_blank" class="btn btn-default" style="background: green;"><i class="fa fa-print"></i></a>
                                                </td>
                                                <td>
                                                    @if($order->delivery_status == 'Completed' && $review == Null)
                                                        <a class="btn btn-default" data-toggle="modal" onclick="getProductId('{{$order->order_details->product_id}}')" data-target="#exampleModal" style="background: yellow;"><i class="fa fa-star"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Submit Your Review</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form class="ps-form--review" action="{{route('user.order.review.store')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="product_id" id="product_id">
                                                <div class="modal-body">
{{--                                                    <h4>Submit Your Review</h4>--}}
                                                    <div class="form-group form-group__rating">
                                                        <label>Your rating of this product</label>
                                                        <select class="ps-rating" name="rating" data-read-only="false">
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="comment" rows="4" placeholder="Write your review here"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="form-group submit">
                                                        <button class="ps-btn">Submit Review</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@push('js')
    <script>
        function getProductId(productId){
            $('#product_id').val(productId);
            console.log(productId)
        }
    </script>
@endpush
