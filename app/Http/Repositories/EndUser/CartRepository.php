<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\CartInterface;
use App\Models\Cart;

class CartRepository implements CartInterface
{

    private $cartModel;

    public function __construct(Cart $cart)
    {
        $this->cartModel = $cart;

    }
    public function index()
    {

        return view('endUser.cart.index');
    }

}
