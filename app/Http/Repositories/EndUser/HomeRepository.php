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
        return view('endUser.homepage', compact('sliders'));
    }

    public function showCategory()
    {

        $categories = $this->getAllCategories();
        return view('endUser.categories', compact('categories'));
    }

    public function getProducts($categorySlug)
    {
        $category = $this->catModel::where('slug', $categorySlug)->first();
        if ($category) {
            $products = $this->productModel::where('slug', $categorySlug)->get();
            //or $category->products()->get();
            return view('endUser.products.index', compact('products', 'category'));
        } else {
            return redirect()->back();
        }
    }
}
