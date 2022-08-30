<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\CartInterface;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $cartInterface;

    public function __construct(CartInterface $cartInterface)
    {
        $this->cartInterface = $cartInterface;

    }

    public function index()
    {
        return $this->cartInterface->index();
    }
}
