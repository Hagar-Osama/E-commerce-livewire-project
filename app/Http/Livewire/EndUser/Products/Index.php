<?php

namespace App\Http\Livewire\EndUser\Products;

use Livewire\Component;

class Index extends Component
{
    public $products;
    public $category;

    public function mount($products, $category)
    {
        $this->products = $products;
        $this->category = $category;
    }
    public function render()
    {
        return view('livewire.end-user.products.index', [
            'products' => $this->products,
            'category' => $this->category
        ]);
    }
}
