<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name, $slug, $status , $category_id, $brandId;

    public function render()
    {
        $brands = Brand::paginate(5);
        $categories = Category::all();
        return view('livewire.admin.brand.index', ['brands' => $brands, 'categories' => $categories])->extends('layouts.master')->section('content');
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'slug' => 'required',
            'status' => 'required|in:visible,hidden',
            // 'category_id' => 'exists:categories'
        ];
    }

    public function store()
    {
        $this->validate();
        Brand::create([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status,
            'category_id' => $this->category_id,

        ]);
        session()->flash('success', 'Brand Added Succesfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetFields();
        return redirect()->route('brand.index');


    }

    public function resetFields()
    {
        $this->name = null;
        $this->slug = null;
        $this->status = null;
        $this->brandId = null;
        $this->category_id = null;

    }

    public function edit($brandId)
    {
        $this->brandId = $brandId;
        $brand = Brand::findorFail($brandId);
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->status = $brand->status;
        $this->category_id = $brand->category_id;

    }

    public function update()
    {
        $this->validate();

        $brand = Brand::findOrFail($this->brandId);
        $brand->update([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status,
            'category_id' => $this->category_id,


        ]);
        session()->flash('success', 'Brand Updated Succesfully');
        $this->dispatchBrowserEvent('close-modal');
        return redirect()->route('brand.index');
    }

    public function delete($brandId)
    {
        $this->brandId = $brandId;
    }

    public function destroy()
    {
        Brand::destroy($this->brandId);
        session()->flash('warning', 'Brand Deleted Succesfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetFields();
        return redirect()->route('brand.index');

    }


}
