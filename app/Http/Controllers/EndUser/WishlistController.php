<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\WishlistInterface;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    private $wishlistInterface;

    public function __construct(WishlistInterface $wishlistInterface)
    {
        $this->wishlistInterface = $wishlistInterface;

    }

    public function index()
    {
        return $this->wishlistInterface->index();
    }
}
