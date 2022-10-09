@extends('endUser.includes.app')
@section('title')
Searched products
@endsection
@section('content')

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h4>Search Results</h4>
                <div class="underline mb-4"></div>
            </div>
            @forelse($searchProducts as $product)
            <div class="col-md-10">
                <div class="product-card">

                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <div class="product-card-img">
                                <label class="stock bg-danger">New</label>
                                @if($product->images->count() > 0)
                                <a href="{{url('products/'.$product->category->slug . '/'.$product->slug)}}">
                                    <img src="{{asset('storage/products/'.$product->name. '/'.$product->images[0]->image)}}" alt="{{$product->name}}">
                                </a>
                                @endif
                            </div>

                        </div>
                        <div class="col-md-9">
                            <div class="product-card-body">
                                <p class="product-brand">{{$product->brand->name}}</p>
                                <h5 class="product-name">
                                    <a href="{{url('products/'.$product->category->slug . '/'.$product->slug)}}">
                                        {{$product->name}}
                                    </a>
                                </h5>
                                <div>
                                    <span class="selling-price">${{$product->selling_price}}</span>
                                    <span class="original-price">${{$product->price}}</span>
                                </div>
                                <p style="height: 45px; overflow:hidden">
                                    <b>Description: </b>{{$product->description}}
                                </p>
                                <a href="{{url('products/'.$product->category->slug . '/'.$product->slug)}}" class="btn btn-outline-primary">View</a>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            @empty
            <div class="col-md-12">
                <div class="p-2">
                    <h4>No Such Product Found</h4>
                </div>
            </div>
            @endforelse
            <div class="col-md-12">
                {{$searchProducts->appends(request()->input())->links()}}
            </div>

        </div>

    </div>
</div>
</div>
@endsection
