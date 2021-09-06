@extends('frontend.layouts.master')
@section('title','FAQ')
@push('css')
    <style>
        p{
            color: black;
        }
    </style>
@endpush
@section('content')
    <div class="ps-page--single">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>Frequently Asked Questions</li>
                </ul>
            </div>
        </div>
        <div class="ps-faqs">
            <div class="container">
                <div class="text-center">
                    <h3>Frequently Asked Questions</h3>
                </div>
                <div class="text-justify m-5">
                    <h2 style="color:#09c;">ORDER</h2>
                    <div>
                        <h4>Q. How can I order </h4>
                        <p>
                            A. You can select your delivery address by using our map to find your nearest grocery stores. You can browse the nearest store or use our search engine to find your desired products. You can then add them to cart and click on place order. You let us know your delivery detail address.  A representative of store will deliver your order right to your delivery address.
                        </p>
                    </div>
                    <div>
                        <h4>Q. Is there a minimum order value?</h4>
                        <p>
                            A. Yes. Our minimum order value is BDT 300.
                        </p>
                    </div>
                    <div>
                        <h4>Q. Can I place an order for someone else?</h4>
                        <p>
                            A. Yes. During checkout, just update the name and delivery detail address of the person you’re ordering for.
                        </p>
                    </div>
                    <div>
                        <h4>Q. Can I order from multiple stores in the same order?</h4>
                        <p>
                            A. Unfortunately, you can’t order from multiple stores in the same order. However, you can place a separate order from a different store while your current order is being prepared and delivered.
                        </p>
                    </div>
                    <div>
                        <h4>Q. If I not found my expected product in a store. What can I do?</h4>
                        <p>
                            A. Unfortunately, you can't find your expected product, you may select another nearest store.
                        </p>
                    </div>
                    <div>
                        <h4>Q. How can I contact with you?</h4>
                        <p>
                            A. You can always call +880-182-0001-999 (10 am-8 pm) or mail us at support@mudihat.com.
                        </p>
                    </div>
                    <div>
                        <h4>Q. My order is wrong. What do I do?</h4>
                        <p>
                            A. Please Immediately call +880-182-0001-999  (10 am-8 pm) and let us know the problem.
                        </p>
                    </div>
                    <div>
                        <h4>Q. What about the prices? </h4>
                        <p>
                            A. Our prices are MRP but we try our best to offer them to you at or below market prices. If you feel that any product price is unfairly, please let us know.
                        </p>
                    </div>
                    <div>
                        <h4>Q. What about quality?</h4>
                        <p>
                            A. We try our best to maintain quality items for you but if you are dissatisfied, you can always send them back with the delivery person. If you forget to do that, you can call us within 1 hour and store will replace the item for free.
                        </p>
                    </div>
                </div>
                <div class="text-justify m-5">
                    <h2 style="color:#09c;">DELIVERY</h2>
                    <div>
                        <h4>Q. My order expected delivery time? </h4>
                        <p>
                            A. A representative of store are try to deliver your product as quickly as possible. They can usually deliver between 15 to 30 minutes from when you place the order. Our target is fastest delivery the products to you.
                        </p>
                    </div>
                    <div>
                        <h4>Q. How much do deliveries cost?</h4>
                        <p>
                            A. There is a FREE delivery fee.
                        </p>
                    </div>
                    <div>
                        <h4>Q. What are your delivery hours?</h4>
                        <p>
                            A. We deliver from 8 am to 10 pm of every day. You can choose from available slots to find something that is convenient to you.
                        </p>
                    </div>
                    <div>
                        <h4>Q. Should I tip the delivery representative? </h4>
                        <p>
                            A. Tips are not required. But representatives of store appreciate recognition for their hard work.
                        </p>
                    </div>
                </div>
                <div class="text-justify m-5">
                    <h2 style="color:#09c;">PAYMENT</h2>
                    <div>
                        <h4>Q. How do I pay?  </h4>
                        <p>
                            A. We accept cash on delivery. Don’t worry, A representative of store should always carry enough change.
                        </p>
                    </div>
                    <div>
                        <h4>Q. Do you accept online payment?</h4>
                        <p>
                            A. Sorry! We don’t accept online payment right now. We will integrate online payment very soon. Now we accept cash on delivery only.
                        </p>
                    </div>
                </div>
{{--                <div class="text-justify m-5">--}}
{{--                    <h2 style="color:#09c;">RETURN POLICY</h2>--}}
{{--                    <div>--}}
{{--                        <h4>Q. What is your policy on return?</h4>--}}
{{--                        <p>--}}
{{--                            --}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <h4>Q. What is your policy on refund?</h4>--}}
{{--                        <p>--}}
{{--                            --}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
@endsection
