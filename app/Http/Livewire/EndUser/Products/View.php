<?php

namespace App\Http\Livewire\EndUser\Products;

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

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function selectedColor($productColorId) ///here we get the product color id and then get the color qty to check the stock availability
    {
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
}
