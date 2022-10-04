<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\HomeInterface;
use App\Http\Traits\CategoryTraits;
use App\Http\Traits\SliderTraits;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;

class HomeRepository implements HomeInterface
{
    use SliderTraits;
    use CategoryTraits;
    private $sliderModel;
    private $catModel;
    private $productModel;
    public function __construct(Slider $slider, Category $category, Product $product)
    {
        $this->sliderModel = $slider;
        $this->catModel = $category;
        $this->productModel = $product;
    }
    public function index()
    {
        $sliders = $this->getAllSliders();
        $trendyProducts = $this->productModel::where('trendy', 'yes')->latest()->take(15)->get();
        return view('endUser.homepage', compact('sliders', 'trendyProducts'));
    }

    public function showCategory()
    {

        $categories = $this->getAllCategories();
        return view('endUser.categories', compact('categories'));
    }

    public function showNewArrivals()
    {
        $newArrivals = $this->productModel::latest()->take(3)->get();
        return view('endUser.new-arrivals', compact('newArrivals'));

    }

    public function showFeaturedProducts()
    {
        $featuredProducts = $this->productModel::where('featured', 'yes')->get();
        return view('endUser.featured-products', compact('featuredProducts'));

    }


    public function getProducts($categorySlug)
    {
        $category = $this->catModel::where('slug', $categorySlug)->first();
        if ($category) {
            // $products = $this->productModel::where('slug', $categorySlug)->get();
            // //or $category->products()->get();
            return view('endUser.products.index', compact('category'));
        } else {
            return redirect()->back();
        }
    }

    public function viewProducts($categorySlug, $productSlug)
    {
        $category = $this->catModel::where('slug', $categorySlug)->first();
        if ($category) {
            $product = $this->productModel::where('slug', $productSlug)->first();
            if ($product) {
                return view('endUser.products.view', compact('category', 'product'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function thankYou()
    {
        return view('EndUser.thank_you');
    }

}
