<?php

namespace App\Http\Livewire\EndUser;

use App\Models\Cart;
use App\Models\ProductColor;
use Livewire\Component;

class CartShow extends Component
{
    public $totalPrice = 0;
    
    public function render()
    {
        $carts = Cart::where('user_id', auth()->user()->id)->get();

        return view('livewire.end-user.cart-show', ['carts' => $carts]);
    }

    public function incrementQty($cartId)
    {
        $cart = Cart::where([['user_id', auth()->user()->id], ['id', $cartId]])->first();
        if ($cart) {
            if (ProductColor::where('id', $cart->product_color_id)->exists()) {
                $productColors = ProductColor::where('id', $cart->product_color_id)->first();
                if ($productColors->color_qty > $cart->quantity) {
                    $cart->increment('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Quantity Updated',
                        'type' => 'success',
                        'status' => 200
                    ]);
                } else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Only ' . $productColors->color_qty . ' Available',
                        'type' => 'success',
                        'status' => 200
                    ]);
                }
            } else {
                if ($cart->products->qty > $cart->quantity) {
                    $cart->increment('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Quantity Updated',
                        'type' => 'success',
                        'status' => 200
                    ]);
                } else {

                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Only ' . $cart->products->qty . ' Available',
                        'type' => 'success',
                        'status' => 200
                    ]);
                }
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'something went wrong',
                'type' => 'error',
                'status' => 404
            ]);
        }
    }

    public function decrementQty($cartId)
    {
        $cart = Cart::where([['user_id', auth()->user()->id], ['id', $cartId]])->first();
        if ($cart) {
            if (ProductColor::where('id', $cart->product_color_id)->exists()) {
                $productColors = ProductColor::where('id', $cart->product_color_id)->first();
                if ($productColors->color_qty >= $cart->quantity) {
                    $cart->decrement('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Quantity Updated',
                        'type' => 'success',
                        'status' => 200
                    ]);
                } else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Only ' . $productColors->color_qty . ' Available',
                        'type' => 'success',
                        'status' => 200
                    ]);
                }
            } else {
                if ($cart->products->qty >= $cart->quantity) {
                    $cart->decrement('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Quantity Updated',
                        'type' => 'success',
                        'status' => 200
                    ]);
                } else {

                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Only ' . $cart->products->qty . ' Available',
                        'type' => 'success',
                        'status' => 200
                    ]);
                }
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'something went wrong',
                'type' => 'error',
                'status' => 404
            ]);
        }
    }

    public function removeCart($cartId)
    {
        $cart = Cart::where([['id', $cartId],['user_id', auth()->user()->id]]);
        $cart->delete();
        //when we delete the cart we fire this event 'cartAddedOrUpdated'
        $this->emit('cartAddedOrUpdated');
        $this->dispatchBrowserEvent('message', [
            'text' => 'Product Removed Successfully From The Cart',
            'type' => 'success',
            'status' => 409
        ]);
    }
}
