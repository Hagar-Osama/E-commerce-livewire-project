<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;


class CategoryIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $categoryId;

    public function render()
    {
        $categories = Category::paginate(1);
        return view('livewire.admin.category.index', ['categories'=>$categories])->extends('layouts.master');
    }

    public function delete($categoryId)
    {

       $this->categoryId = $categoryId;


    }


    public function destroy()
    {
        $category = Category::find($this->categoryId);
        $category->destroy($this->categoryId);
        $path = 'storage/categories/'. $category->image;
        if(File::exists($path)) {
            File::delete($path);
        }
        session()->flash('warning', 'Category Deleted Successfully');
        $this->dispatchBrowserEvent('close-modal');
        return redirect()->route('category.index');
    }

}
