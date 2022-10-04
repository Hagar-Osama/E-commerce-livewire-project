@extends('endUser.includes.app')
@section('title')
Featured Products
@endsection
@section('content')

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Featured Products</h4>
                <div class="underline mb-4"></div>
            </div>
            @forelse($featuredProducts as $product)
            <div class="col-md-3">
                <div class="product-card">
                    <div class="product-card-img">
                        <label class="stock bg-danger">New</label>
                        @if($product->images->count() > 0)
                        <a href="{{url('products/'.$product->category->slug . '/'.$product->slug)}}">
                            <img src="{{asset('storage/products/'.$product->name. '/'.$product->images[0]->image)}}" alt="{{$product->name}}">
                        </a>
                        @endif
                    </div>
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

                    </div>
                </div>
            </div>

            @empty
            <div class="col-md-12">
                <div class="p-2">
                    <h4>No Featured Product Available</h4>
                </div>
            </div>
            @endforelse
            <div class="text-center">
                <a href="{{route('categories.home')}}" class="btn btn-warning px-3">Shop More</a>
            </div>

        </div>

    </div>
</div>
</div>
@endsection
