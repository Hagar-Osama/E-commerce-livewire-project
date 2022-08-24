<?php

namespace App\Http\Livewire\EndUser;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishlistCount extends Component
{
    public $wishlistCount;
    protected $listeners = ['wishlistUpdate' => 'checkWishlistCount']; //any firing in the event wishlistupdate then the change will happen to the checkwishlistcount method


    public function checkWishlistCount()
    {
        if (Auth::check()) {
            $this->wishlistCount = Wishlist::where('user_id', auth()->user()->id)->count();
            return $this->wishlistCount;
        } else {
            return $this->wishlistCount = 0;
        }
    }

    public function render()
    {
        $this->wishlistCount = $this->checkWishlistCount();
        return view('livewire.end-user.wishlist-count', [ 'wishlistCount' => $this->wishlistCount]);
    }
}
