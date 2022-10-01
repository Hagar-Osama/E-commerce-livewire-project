@extends('layouts.master')
@section('title')
Order Details
@endsection
@section('content')
<div class="py-5 py-md-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
                @endif
                <div class="card-body">
                    <h4 class="text-primary"><i class="fa fa-shopping-cart text-dark"></i> My Order Details
                        <a href="{{route('order.index')}}" class="btn btn-danger btn-sm float-end mx-1">Back</a>
                        <a href="{{route('order.showInvoice', $order->id)}}" target="_blank" class="btn btn-primary btn-sm float-end mx-1">View Invoice</a>
                        <a href="{{route('order.downloadInvoice', $order->id)}}" class="btn btn-warning btn-sm float-end mx-1">Download Invoice</a>

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
                                    <th width="10%">{{$loop->iteration}}</th>
                                    <td width="10%"> @foreach($orderDetail->products->images as $productImage)
                                        <img src="{{asset('storage/products/'.$orderDetail->products->name.'/'.$productImage->image)}}" style="width: 50px; height: 50px" alt="{{$orderDetail->products->name}}">
                                        @endforeach
                                    </td>
                                    <td width="10%"> {{$orderDetail->products->name}}
                                        @if($orderDetail->productColors)
                                        @if($orderDetail->productColors->colors)
                                        <span>- Color : {{$orderDetail->productColors->colors->name}}</span>
                                        @endif
                                        @endif
                                    </td>
                                    <td width="10%">${{$orderDetail->price}}</td>
                                    <td width="10%">{{$orderDetail->quantity}}</td>
                                    <td width="10%" class="fw-bold">${{$orderDetail->quantity * $orderDetail->price }}</td>
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
                <div class="card border mt-3">
                    <div class="card-body">
                        <h4>Order Process (Order Status Updates)</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-5">
                                <form action="{{route('order.status.update', $order->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <label>Update Order Status</label>
                                    <div class="input-group">
                                        <select name="status" class="form-select" id="exampleSelectGender">
                                            <option value="none" selected disabled hidden>Choose a status</option>
                                            <option value="">All</option>
                                            <option value="in progress" @if(Request::get('status')=='in progress' ) selected @else "" @endif>In Progress</option>
                                            <option value="completed" @if(Request::get('status')=='completed' ) selected @else "" @endif>Completed</option>
                                            <option value="pending" @if(Request::get('status')=='pending' ) selected @else "" @endif>Pending</option>
                                            <option value="out for delivery" @if(Request::get('status')=='out for delivery' ) selected @else "" @endif>Out For Delivery</option>
                                            <option value="canceled" @if(Request::get('status')=='canceled' ) selected @else "" @endif>Canceled</option>
                                        </select>

                                        <button type="submit" class="btn btn-primary text-white">Update</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-7">
                                <br />
                                <h4 class="mt-3"> Current Order Status: <span class="test-uppercase">{{$order->status_message}}</span></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
