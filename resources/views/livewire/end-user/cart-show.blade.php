<div class="py-3 py-md-5">
    <div class="container">
        <h4>My Cart</h4>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="shopping-cart">

                    <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Products</h4>
                            </div>
                            <div class="col-md-1">
                                <h4>Price</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Quantity</h4>
                            </div>
                            <div class="col-md-1">
                                <h4>Total</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Remove</h4>
                            </div>
                        </div>
                    </div>

                    <div class="cart-item">
                        <div class="row">
                            @isset($carts)
                            @forelse($carts as $cart)
                            <div class="col-md-6 my-auto">
                                <a href="{{route('products.view',[$cart->products->category->slug,$cart->products->slug])}}">
                                    <label class="product-name">
                                        @foreach($cart->products->images as $productImage)
                                        <img src="{{asset('storage/products/'.$cart->products->name.'/'.$productImage->image)}}" style="width: 50px; height: 50px" alt="{{$cart->products->name}}">
                                        @endforeach
                                        {{$cart->products->name}}
                                        @if($cart->productColors)
                                        @if($cart->productColors->colors)
                                        <span>- Color : {{$cart->productColors->colors->name}}</span>
                                        @endif
                                        @endif
                                    </label>
                                </a>
                            </div>
                            <div class="col-md-1 my-auto">
                                <label class="price">${{$cart->products->price}} </label>
                            </div>
                            <div class="col-md-2 col-7 my-auto">
                                <div class="quantity">
                                    <div class="input-group">
                                        <button type="button" wire:loading.attr="disabled" wire:click="decrementQty({{$cart->id}}) class=" btn btn1"><i class="fa fa-minus"></i></button>
                                        <input type="text" value="{{$cart->quantity}}" class="input-quantity" />
                                        <button type="button" wire.loading.attr="disabled" wire:click="incrementQty({{$cart->id}}) class=" btn btn1"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1 my-auto">
                                <label class="price">${{$cart->products->price * $cart->quantity}} </label>
                                @php $totalPrice += $cart->products->selling_price * $cart->quantity @endphp
                            </div>
                            <div class="col-md-2 col-5 my-auto">
                                <div class="remove">
                                    <button type="button" wire:loading.attr="disabled" wire:click="removeCart({{$cart->id}})" class="btn btn-danger btn-sm">
                                        <div wire:loading.remove wire:target="removeCart({{$cart->id}})">
                                            <i class="fa fa-trash"></i> Remove
                                        </div>
                                        <div wire:loading wire:target="removeCart({{$cart->id}})">
                                            <i class="fa fa-trash"></i> Removing
                                        </div>
                                    </button>
                                </div>
                            </div>
                            @empty
                            <div class="text-danger text-center">
                                <h4>No Product Added To Cart</h4>
                            </div>
                            @endforelse
                            @endisset
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 my-md-auto mt-3">
                        @if($carts->count() != 0)
                        <h5>Get the best deals & offers <a href="{{url('products/'.$cart->products->category->slug . '/'.$cart->products->slug)}}">Shop Now</a></h5>
                        @endif
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="shadow-sm bg-white p-3">
                            <h4> Total :
                                <span class="float-end">${{$totalPrice}}</span>
                            </h4>
                            <hr>
                            <a href="{{route('checkout.index')}}" class="btn btn-warning w-100">CheckOut</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
