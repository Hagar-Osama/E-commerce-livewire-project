@extends('layouts.master')
@section('title')
Orders
@endsection
@section('content')
<div>
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Orders
                        </h2>
                    </div>
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <form method="GET" action="">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Filter By Date</label>
                                            <input type="date" name="date" value="{{Request::get('date') ?? date('Y-m-d')}}" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Filter By Status</label>
                                            <label for="exampleSelectGender">Status</label>
                                            <select name="status" class="form-select" id="exampleSelectGender">
                                                <option value="none" selected disabled hidden>Choose a status</option>
                                                <option value="">All</option>
                                                <option value="in progress" @if(Request::get('status') == 'in progress')  selected @else "" @endif>In Progress</option>
                                                <option value="completed" @if(Request::get('status') == 'completed') selected @else "" @endif>Completed</option>
                                                <option value="pending" @if(Request::get('status') == 'pending') selected @else "" @endif>Pending</option>
                                                <option value="out for delivery" @if(Request::get('status') == 'out for delivery') selected @else "" @endif>Out For Delivery</option>
                                                <option value="canceled" @if(Request::get('status') == 'canceled') selected @else "" @endif>Canceled</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <br />
                                            <button type="submit" class="btn btn-primary">Filter</button>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <div class="table-responsive pt-3">
                                    <table class="table table-bordered">
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
                                                    <a href="{{route('order.show', $order->id)}}" class="btn-sm btn btn-primary">
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

        </div>
        @endsection
