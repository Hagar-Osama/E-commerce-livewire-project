@extends('endUser.includes.app')
@section('title')
My Orders
@endsection
@section('content')
<div class="py-5 py-md-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="shadow bg-white p-3">
                    <h4 class="mb-4">My Orders</h4>
                    <hr>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tracking Number</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Payment Mode</th>
                                    <th scope="col">Order Date</th>
                                    <th scope="col">Status Message</th>
                                    <th scope="col">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse($orders as $order)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$order->tracking_number}}</td>
                                    <td>{{$order->fullname}}</td>
                                    <td>{{$order->payment_method}}</td>
                                    <td>{{$order->created_at->diffForHumans()}}</td>
                                    <td>{{$order->status_message}}</td>
                                    <td>
                                        <a href="{{route('orders.show', $order->id)}}" class="btn-sm btn btn-primary">
                                            View
                                            <i class="mdi mdi-file-check btn-icon-append"></i>
                                        </a>
                                    </td>

                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7">No Orders Available</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{$orders->links()}}
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
