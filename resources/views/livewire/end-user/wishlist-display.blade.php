<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Price</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>

                        <div class="cart-item">
                            <div class="row">
                                @forelse($wishlists as $wishlist)
                                <div class="col-md-6 my-auto">
                                    <a href="{{route('products.view',[$wishlist->products->category->slug,$wishlist->products->slug])}}">
                                        <label class="product-name">
                                            @foreach($wishlist->products->images as $productImage)
                                            <img src="{{asset('storage/products/'.$wishlist->products->name.'/'.$productImage->image)}}" style="width: 50px; height: 50px" alt="{{$wishlist->products->name}}">
                                            @endforeach
                                            {{$wishlist->products->name}}
                                        </label>
                                    </a>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <label class="price">${{$wishlist->products->price}} </label>
                                </div>
                                <div class="col-md-4 col-12 my-auto">
                                    <div class="remove">
                                        <button type="button" wire:click="removeWishlist({{$wishlist->id}})" class="btn btn-danger btn-sm">
                                            <div wire:loading.remove>
                                            <i class="fa fa-trash"></i> Remove
                                            </div>
                                            <div wire:loading wire:target="removeWishlist({{$wishlist->id}})">
                                            <i class="fa fa-trash"></i> Removing
                                            </div>
                                        </button>
                                    </div>
                                </div>
                                @empty
                                <div class="text-danger text-center">
                                    <h4>No Wishlist Added</h4>
                                </div>
                                @endforelse
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
