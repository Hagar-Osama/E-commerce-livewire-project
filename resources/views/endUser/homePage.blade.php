@extends('endUser.includes.app')
@section('title')
E-commerce Website
@endsection
@section('content')
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-inner">
            @foreach($sliders as $slider)
            <div class="carousel-item active">
                <img src="{{asset('storage/sliders/'.$slider->image)}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h1>{{$slider->title}}</h1>
                    <p>{{$slider->description}}</p>
                </div>
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h4>Welcome To Amazon E-commerce</h4>
                    <div class="underline mx-auto"></div>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        It has survived not only five centuries, but also the leap into electronic typesetting,
                        remaining essentially unchanged.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Trending Products</h4>
                    <div class="underline mb-4"></div>
                </div>
                @if($trendyProducts)
                <div class="col-md-12">
                <div class="owl-carousel owl-theme trending-product">
                    @foreach($trendyProducts as $product)
                    <div class="item">
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
                    @endforeach
                    </div>

                </div>
                @else
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>No Product Available</h4>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    @endsection
    @section('script')
    <script>
        $('.trending-product').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
    </script>
    @endsection
