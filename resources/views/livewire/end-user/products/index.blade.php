<div>
    <div class="row">
        <div class="col-md-3">
            @if($category->brands)
            <div class="card">
                <div class="card-header">
                    <h4>Brands</h4>
                </div>
                <div class="card-body">
                    @foreach($category->brands as $brand)
                    <label class="d-block">
                        <input type="checkbox" wire:model="brands" value="{{$brand->id}}">{{$brand->name}}
                    </label>
                    @endforeach
                </div>
            </div>
            @endif

            <div class="card mt-3">
                <div class="card-header">
                    <h4>Prices</h4>
                </div>
                <div class="card-body">
                    <label class="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInput" value="high-to-low">High To Low
                    </label>
                    <label class="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInput" value="low-to-high">Low To High
                    </label>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="row">
                @forelse($products as $product)
                <div class="col-md-4">
                    <div class="product-card">
                        <div class="product-card-img">
                            @if($product->qty >0)
                            <label class="stock bg-success">In Stock</label>
                            @else
                            <label class="stock bg-danger">Out Of Stock</label>
                            @endif
                            @if($product->images->count() > 0)
                            <a href="{{url('products/'.$category->slug . '/'.$product->slug)}}">
                                <img src="{{asset('storage/products/'.$product->name. '/'.$product->images[0]->image)}}" alt="{{$product->name}}">
                            </a>
                            @endif
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">{{$product->brand->name}}</p>
                            <h5 class="product-name">
                                <a href="{{url('products/'.$category->slug . '/'.$product->slug)}}">
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
                        <h4>No Product Available for This {{$category->name}}</h4>
                    </div>
                    @endforelse


                </div>
            </div>
        </div>
    </div>
</div>
