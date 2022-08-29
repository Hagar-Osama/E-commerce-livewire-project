<?php

namespace App\Http\Livewire\EndUser\Products;

use App\Models\Cart;
use App\Models\ProductColor;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{
    public $category;
    public $product;
    public $productColorSelected;
    public $qtyCount = 1;
    public $productColorId;

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function selectedColor($productColorId) ///here we get the product color id and then get the color qty to check the stock availability
    {
        $this->productColorId = $productColorId;
        $productColor = ProductColor::where('id', $productColorId)->first();
        $this->productColorSelected = $productColor->color_qty;
        if ($this->productColorSelected === 0) {
            $this->productColorSelected = 'outOfStock';
        }
    }

    public function render()
    {
        return view('livewire.end-user.products.view', [
            'category' => $this->category,
            'product' => $this->product
        ]);
    }

    public function incrementQty()
    {
        $this->qtyCount++;
    }

    public function decrementQty()
    {
        if ($this->qtyCount > 1)
            $this->qtyCount--;
    }

    public function addToWishlist($productId)
    {
        if (Auth::check()) {
            if (Wishlist::where([['product_id', $productId], ['user_id', auth()->user()->id]])->exists()) {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product already Added to Wishlist',
                    'type' => 'warning',
                    'status' => 401
                ]);
                // session()->flash('message', 'Product already Added to Wishlist');
            } else {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);
                //when we create the wishlist we fire this event 'wishlistUpdate'
                $this->emit('wishlistUpdate');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product  Added Successfully to Wishlist',
                    'type' => 'success',
                    'status' => 409
                ]);

                // session()->flash('message', 'Product Added Successfully to Wishlist');
                // return redirect()->back();

            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please  Login First To Continue',
                'type' => 'waring',
                'status' => 403
            ]);
            return false;
        }
    }

    public function addToCart($productId)
    {
        //first check user authentication
        if (Auth::check()) {
            //check product id availability
            if ($this->product->where('id', $productId)->exists()) {
                //products with colors
                //check product color qty
                if ($this->product->productColors()->count() > 0) {
                    //check whether the product color selected or not
                    if ($this->productColorSelected != null) {
                        //chech product color id
                        $productColor = ProductColor::where('id', $this->productColorId)->first();
                        //check whether the product is already added or not
                        if (Cart::where([['user_id', auth()->user()->id], ['product_id', $productId],['product_color_id', $this->productColorId]])->exists()) {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Product already Added to Wishlist',
                                'type' => 'warning',
                                'status' => 401
                            ]);
                        } else {
                            //now we will check the product color qty availabilty of the product color id
                            if ($productColor->color_qty > 0) {
                                //here we check whether the product color qty is greater than the qtycount selected by the user
                                if ($productColor->color_qty >= $this->qtyCount) {
                                    //add to cart
                                    Cart::create([
                                        'user_id' => auth()->user()->id,
                                        'product_id' => $productId,
                                        'product_color_id' => $this->productColorId,
                                        'quantity' => $this->qtyCount
                                    ]);
                                    $this->emit('cartAdded');
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Product  Added Successfully to Cart',
                                        'type' => 'success',
                                        'status' => 409
                                    ]);
                                } else {
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Only ' . $productColor->color_qty . ' Quantity Available',
                                        'type' => 'waring',
                                        'status' => 404
                                    ]);
                                }
                            } else {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Out Of Stock',
                                    'type' => 'waring',
                                    'status' => 404
                                ]);
                            }
                        }
                    } else {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Please Choose a Color',
                            'type' => 'waring',
                            'status' => 404
                        ]);
                    }
                } else {
                    //products without colors
                    //check for product quantity
                    if (Cart::where([['user_id', auth()->user()->id], ['product_id', $productId]])->exists()) {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Product already Added to Wishlist',
                            'type' => 'warning',
                            'status' => 401
                        ]);
                    } else {
                        if ($this->product->qty > 0) {
                            if ($this->product->qty >= $this->qtyCount) {
                                //add to cart
                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $productId,
                                    'quantity' => $this->qtyCount
                                ]);
                                $this->emit('cartAdded');
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Product  Added Successfully to Cart',
                                    'type' => 'success',
                                    'status' => 409
                                ]);
                            } else {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Only ' . $this->product->qty . ' Quantity Available',
                                    'type' => 'waring',
                                    'status' => 404
                                ]);
                            }
                        } else {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Out Of Stock',
                                'type' => 'waring',
                                'status' => 404
                            ]);
                        }
                    }
                }
            } else {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product Not Found',
                    'type' => 'waring',
                    'status' => 404
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please  Login First To Continue',
                'type' => 'waring',
                'status' => 403
            ]);
        }
    }
}
