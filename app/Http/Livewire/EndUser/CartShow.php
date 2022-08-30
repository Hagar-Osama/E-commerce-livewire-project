<?php

namespace App\Http\Livewire\EndUser;

use App\Models\Cart;
use Livewire\Component;

class CartShow extends Component
{
    public function render()
    {
        $carts = Cart::where('user_id', auth()->user()->id)->get();

        return view('livewire.end-user.cart-show', ['carts' => $carts]);
    }
}
