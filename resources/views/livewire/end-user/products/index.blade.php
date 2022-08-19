<div>
   <div class="row">
   @forelse($products as $product)
            <div class="col-md-3">
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
                    <h4>No Product Available for This (($category->name}}</h4>
                </div>
                @endforelse


            </div>
   </div>
</div>
