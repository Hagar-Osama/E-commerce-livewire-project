<?php

namespace App\Http\Livewire\EndUser\Products;

use App\Models\ProductColor;
use Livewire\Component;

class View extends Component
{
    public $category;
    public $product;
    public $productColorSelected;

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function selectedColor($productColorId)///here we get the product color id and then get the color qty to check the stock availability
    {
        $productColor = ProductColor::where('id', $productColorId)->first();
        $this->productColorSelected = $productColor->color_qty;
        if($this->productColorSelected === 0) {
            $this->productColorSelected = 'outOfStock';
        }

    }


    public function render()
    {
        return view('livewire.end-user.products.view', [
            'category' => $this->category,
            'product' => $this->product
        ]);
    }
}
