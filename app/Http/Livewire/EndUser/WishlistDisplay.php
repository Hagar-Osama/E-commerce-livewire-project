<?php

namespace App\Http\Livewire\EndUser;

use App\Models\Wishlist;
use Livewire\Component;

class WishlistDisplay extends Component
{
    public function render()
    {
        $wishlists = Wishlist::where('user_id', auth()->user()->id)->get();
        return view('livewire.end-user.wishlist-display',['wishlists' => $wishlists]);
    }

    public function removeWishlist($wishlistId)
    {
        $wishlist = Wishlist::where([['id', $wishlistId],['user_id', auth()->user()->id]]);
        $wishlist->delete();
        //when we delete the wishlist we fire this event 'wishlistUpdate'
        $this->emit('wishlistUpdate');
        $this->dispatchBrowserEvent('message', [
            'text' => 'Product Removed Successfully From The Wishlist',
            'type' => 'success',
            'status' => 409
        ]);
    }
}
