<?php
namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\HomeInterface;
use App\Http\Traits\CategoryTraits;
use App\Http\Traits\SliderTraits;
use App\Models\Category;
use App\Models\Slider;

class HomeRepository implements HomeInterface {
use SliderTraits;
use CategoryTraits;
private $sliderModel;
private $catModel;
public function __construct(Slider $slider, Category $category)
{
    $this->sliderModel = $slider;
    $this->catModel = $category;

}
    public function index()
    {
        $sliders = $this->getAllSliders();
        return view('endUser.homepage', compact('sliders'));
    }

    public function showCategory()
    {

        $categories = $this->getAllCategories();
        return view('endUser.categories', compact( 'categories'));
    }

}
