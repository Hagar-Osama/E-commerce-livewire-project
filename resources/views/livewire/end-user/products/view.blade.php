<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div>
                @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border" wire:ignore>
                        <div class="exzoom" id="exzoom">

                            <div class="exzoom_img_box">
                                <ul class='exzoom_img_ul'>
                                    @foreach($product->images as $productImage)
                                    <li><img src="{{asset('storage/products/'.$product->name. '/'. $productImage->image)}}" /></li>
                                    @endforeach

                                </ul>
                            </div>
                            <!-- <a href="https://www.jqueryscript.net/tags.php?/Thumbnail/">Thumbnail</a> Nav-->
                            <div class="exzoom_nav"></div>
                            <!-- Nav Buttons -->
                            <p class="exzoom_btn">
                                <a href="javascript:void(0);" class="exzoom_prev_btn">
                                    < </a>
                                        <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{$product->name}}
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{$product->category->name}} / {{$product->name}}
                        </p>
                        <div>
                            <span class="selling-price">${{$product->selling_price}}</span>
                            <span class="original-price">${{$product->price}}</span>
                        </div>
                        <div>
                            @if($product->productColors->count() > 0)
                            @if($product->productColors)
                            @foreach($product->productColors as $productColor)
                            <!-- <input type="radio" name="colorSelection" value="$productColor->id">{{$productColor->colors->name}} -->
                            <label class="colorSelectionLabel text-dark" style="background-color: {{$productColor->colors->code}} " wire:click="selectedColor({{$productColor->id}})">
                                {{$productColor->colors->name}}
                            </label>
                            @endforeach
                            @endif
                            <div>

                                <!--product color qty check-->
                                @if($this->productColorSelected == 'outOfStock')
                                <label class="btn-sm px-1 mt-2 text-white bg-danger">Out Of Stock</label>
                                @elseif($this->productColorSelected > 0)
                                <label class="btn-sm px-1 mt-2 text-white bg-success">In Stock</label>
                                @endif
                            </div>

                            <!-- product qty check-->
                            @else
                            @if($product->qty)
                            <label class="btn-sm px-1 mt-2 text-white bg-success">In Stock</label>
                            @else
                            <label class="btn-sm px-1 mt-2 text-white bg-danger">Out Of Stock</label>
                            @endif
                            @endif
                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click="decrementQty"><i class="fa fa-minus"></i></span>
                                <input type="text" wire:model="qtyCount" value="{{$this->qtyCount}}" readonly class="input-quantity" />
                                <span class="btn btn1" wire:click="incrementQty"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="button" wire:click="addToCart({{$product->id}})" class="btn btn1"> <i class="fa fa-heart"></i> Add To Cart </button>
                            <button type="button" wire:click="addToWishlist({{$product->id}})" class="btn btn1">
                                <div wire:loading.remove wire:target="addToWishlist>
                                    <i class=" fa fa-shopping-cart"></i> Add To Wishlist
                                </div>
                                <div wire:loading wire:target="addToWishlist">
                                    Processing Adding...
                                </div>
                            </button>

                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Small Description</h5>
                            <p>
                                {{$product->brief}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {{$product->description}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $(function() {

        $("#exzoom").exzoom({

            // thumbnail nav options
            "navWidth": 60,
            "navHeight": 60,
            "navItemNum": 5,
            "navItemMargin": 7,
            "navBorder": 1,

            // autoplay
            "autoPlay": false,

            // autoplay interval in milliseconds
            "autoPlayTimeout": 2000

        });

    });
</script>
@endpush
