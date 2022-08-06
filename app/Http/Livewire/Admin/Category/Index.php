<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;


class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $categoryId;

    public function render()
    {
        $categories = Category::paginate(1);
        return view('livewire.admin.category.index', ['categories'=>$categories]);
    }

    // public function deleteCategory($categoryId)
    // {

    //    return   $categoryId;


    // }

    // public function destroyCategory()
    // {
    //     $category = Category::find($this->categoryId);
    //     $category->delete();
    //     $path = 'storage/categories/'. $category->image;
    //     if(File::exists($path)) {
    //         File::delete($path);
    //     }
    //     session()->flash('danger', 'Category Deleted Successfully');
    //     return redirect()->to('admin.category.index');
    // }

}
