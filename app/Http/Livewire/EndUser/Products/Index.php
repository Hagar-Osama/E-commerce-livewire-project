<?php

namespace App\Http\Livewire\EndUser\Products;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $products;
    public $category;
    public $brands =[];
    protected $queryString = ['brands' => ['except' => '', 'as' => 'brand']];


    public function mount( $category)
    {
        $this->category = $category;
    }

    public function render()
    {
/////I have a problem here,filtering products by brands are not working 
        $this->products = Product::where('category_id', $this->category->id)
        ->when($this->brands, function($query){
            $query->whereIn('brand_id', $this->brands);

        })->where('status', 'visible')->get();
        return view('livewire.end-user.products.index', [
            'products' => $this->products,
            'category' => $this->category
        ]);
    }
}
