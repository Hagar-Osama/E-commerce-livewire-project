<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\HomeInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $homeInterface;

    public function __construct(HomeInterface $homeInterface)
    {
        $this->homeInterface = $homeInterface;

    }

    public function index()
    {
        return $this->homeInterface->index();
    }

    public function searchProducts(Request $request)
    {
        return $this->homeInterface->searchProducts($request);
    }

    public function showCategory()
    {
        return $this->homeInterface->showCategory();
    }


    public function getProducts($categorySlug)
    {
        return $this->homeInterface->getProducts($categorySlug);
    }

    public function viewProducts($categorySlug, $productSlug)
    {
        return $this->homeInterface->viewProducts($categorySlug, $productSlug);

    }

    public function thankYou()
    {
        return $this->homeInterface->thankYou();
    }


    public function showNewArrivals()
    {
        return $this->homeInterface->showNewArrivals();
    }

    public function showFeaturedProducts()
    {
        return $this->homeInterface->showFeaturedProducts();

    }




}
