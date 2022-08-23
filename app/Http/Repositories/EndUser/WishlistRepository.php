<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\WishlistInterface;
use App\Models\Wishlist;

class WishlistRepository implements WishlistInterface
{

    private $wishlistModel;

    public function __construct(Wishlist $wishlist)
    {
        $this->wishlistModel = $wishlist;

    }
    public function index()
    {

        return view('endUser.wishlist.index');
    }

}
