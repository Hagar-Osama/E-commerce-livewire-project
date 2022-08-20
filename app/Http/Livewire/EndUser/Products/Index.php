<?php

namespace App\Http\Livewire\EndUser\Products;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $products;
    public $category;
    public $brands = [];
    public $priceInput;
    protected $queryString = [
        'brands' => ['except' => '', 'as' => 'brand'],
        'priceInput' => ['except' => '', 'as' => 'price']
    ];


    public function mount($category)
    {
        $this->category = $category;
    }

    public function render()
    {
        $this->products = Product::where('category_id', $this->category->id)
            ->when($this->brands, function ($query) {
                $query->whereIn('brand_id', $this->brands);
            })
            ->when($this->priceInput, function ($query) {

                $query->when($this->priceInput == 'high-to-low', function ($priceQuery) { //any data comes in the priceInput we should write the query
                    $priceQuery->orderBy('selling_price', 'DESC');
                })
                ->when($this->priceInput == 'low-to-high', function ($priceQuery) {
                    $priceQuery->orderBy('selling_price', 'ASC');
                });
            })
            ->where('status', 'visible')->get();
        return view('livewire.end-user.products.index', [
            'products' => $this->products,
            'category' => $this->category
        ]);
    }
}
