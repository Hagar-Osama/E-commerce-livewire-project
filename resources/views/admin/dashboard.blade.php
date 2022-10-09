@extends('layouts.master')
@section('title')
Livewire E-commerce
@endsection
@section('css')
@endsection
@section('content')
<div class="content-wrapper">

    <div class="row">
        <div class="col-md-12 grid-margin">
            <h2>Welcome back,</h2>
            <h3 style="color: blue;">{{auth()->user()->name}}</h3>
            <p class="mb-md-0">Your analytics dashboard template.</p>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="card-body bg-primary text-white mb-3">
                        <label>Total Orders</label>
                        <h1>{{$totalOrders}}</h1>
                        <a href="{{route('order.index')}}" class="text-white">View</a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-body bg-success text-white mb-3">
                        <label>Today Orders</label>
                        <h1>{{$currentDateOrder}}</h1>
                        <a href="{{route('order.index')}}" class="text-white">View</a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-body bg-warning text-white mb-3">
                        <label>This Month Orders</label>
                        <h1>{{$currentMonthOrder}}</h1>
                        <a href="{{route('order.index')}}" class="text-white">View</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-body bg-danger text-white mb-3">
                        <label>This Year Orders</label>
                        <h1>{{$currentYearOrder}}</h1>
                        <a href="{{route('order.index')}}" class="text-white">View</a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="card-body bg-primary text-white mb-3">
                        <label>Total Products</label>
                        <h1>{{$totalProducts}}</h1>
                        <a href="{{route('product.index')}}" class="text-white">View</a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-body bg-success text-white mb-3">
                        <label>Total Categories</label>
                        <h1>{{$totalCategories}}</h1>
                        <a href="{{route('category.index')}}" class="text-white">View</a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-body bg-warning text-white mb-3">
                        <label>Total Brands</label>
                        <h1>{{$brands}}</h1>
                        <a href="{{route('brand.index')}}" class="text-white">View</a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="card-body bg-primary text-white mb-3">
                        <label>All Users</label>
                        <h1>{{$allUsers}}</h1>
                        <a href="{{route('users.index')}}" class="text-white">View</a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-body bg-success text-white mb-3">
                        <label>Total Admins</label>
                        <h1>{{$admins}}</h1>
                        <a href="{{route('users.index')}}" class="text-white">View</a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-body bg-warning text-white mb-3">
                        <label>Total Users</label>
                        <h1>{{$users}}</h1>
                        <a href="{{route('users.index')}}" class="text-white">View</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@endsection
