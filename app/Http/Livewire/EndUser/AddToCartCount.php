<?php

namespace App\Http\Livewire\EndUser;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddToCartCount extends Component
{
    public $cartCount;
    protected $listeners = ['cartAddedOrUpdated' => 'checkCartCount']; //any firing in the event wishlistupdate then the change will happen to the checkwishlistcount method


    public function checkCartCount()
    {
        if (Auth::check()) {
            $this->cartCount = Cart::where('user_id', auth()->user()->id)->count();
            return $this->cartCount;
        } else {
            return $this->cartCount = 0;
        }
    }

    public function render()
    {
        $this->cartCount = $this->checkCartCount();
        return view('livewire.end-user.add-to-cart-count',['cartCount' => $this->cartCount]);
    }
}
