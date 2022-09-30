@extends('layouts.master')
@section('title')
Order Details
@endsection
@section('content')
<div class="py-5 py-md-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    <h4 class="text-primary"><i class="fa fa-shopping-cart text-dark"></i> My Order Details
                        <a href="{{route('order.index')}}" class="btn btn-danger btn-small float-end">Back</a>
                    </h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Order Details</h5>
                            <hr>
                            <h6>Order Id: {{$order->id}} </h6>
                            <h6>Tracking Number: {{$order->tracking_number}} </h6>
                            <h6>Order Created Date: {{$order->created_at->format('d-m-Y h:i A')}} </h6>
                            <h6>Payment Method: {{$order->payment_method}} </h6>
                            <h6 class="border-p-2 text-success">
                                Order Status Message: <span class="text-uppercase">{{$order->status_message}}</span>
                            </h6>

                        </div>
                        <div class="col-md-6">
                            <h5>User Details</h5>
                            <hr>
                            <h6>Full Name:{{$order->fullname}} </h6>
                            <h6>Email: {{$order->email}} </h6>
                            <h6>Phone: {{$order->ohone}} </h6>
                            <h6>Pin Code: {{$order->pincode}} </h6>
                            <h6>Address: {{$order->address}} </h6>

                        </div>
                    </div>
                    <br>
                    <h5>Order Items</h5>
                    <hr>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Order Item ID</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $totalPrice = 0;
                                @endphp
                                @foreach($order->orderDetails as $orderDetail)
                                <tr>
                                    <th width="100">{{$loop->iteration}}</th>
                                    <td width="100"> @foreach($orderDetail->products->images as $productImage)
                                        <img src="{{asset('storage/products/'.$orderDetail->products->name.'/'.$productImage->image)}}" style="width: 50px; height: 50px" alt="{{$orderDetail->products->name}}">
                                        @endforeach
                                    </td>
                                    <td width="100"> {{$orderDetail->products->name}}
                                        @if($orderDetail->productColors)
                                        @if($orderDetail->productColors->colors)
                                        <span>- Color : {{$orderDetail->productColors->colors->name}}</span>
                                        @endif
                                        @endif
                                    </td>
                                    <td width="100">${{$orderDetail->price}}</td>
                                    <td width="100">{{$orderDetail->quantity}}</td>
                                    <td width="100" class="fw-bold">${{$orderDetail->quantity * $orderDetail->price }}</td>
                                    @php
                                    $totalPrice += $orderDetail->quantity * $orderDetail->price;
                                    @endphp

                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5" class="fw-bold">Total Amount: </td>
                                    <td colspan="1" class="fw-bold">${{$totalPrice}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


        </div>
    </div>
</div>
@endsection
