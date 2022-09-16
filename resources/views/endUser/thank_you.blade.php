@extends('endUser.includes.app')
@section('title')
Thank You For Shopping
@endsection
@section('content')
<div class="py-3 pyt-md-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="p-4 shadow bg-white">
                <h2>Your Logo</h2>
                <h4>Thank You For Shopping With Us!</h4>
                <a href="{{Route('categories.home')}}" class="btn btn-warning">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
