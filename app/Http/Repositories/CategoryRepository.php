<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\CategoryInterface;
use App\Http\Traits\CategoryTraits;
use App\Http\Traits\FilesTraits;
use Illuminate\Support\Str;
use App\Models\Category;
use Exception;

class CategoryRepository implements CategoryInterface
{

    use FilesTraits;
    use CategoryTraits;
    private $catModel;

    public function __construct(Category $category)
    {
        $this->catModel = $category;
    }
    public function index()
    {
        $categories = $this->getAllCategories();
        return view('admin.category.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store($request)
    {
        try {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->hashName();
                $this->uploadFile($image, 'categories', $imageName);
                $this->catModel::create([
                    'name' => $request->name,
                    'slug' => Str::slug($request->slug),
                    'description' => $request->description,
                    'image' => $imageName,
                    'meta_title' => $request->meta_title,
                    'meta_keyword' => $request->meta_keyword,
                    'meta_description' => $request->meta_description,
                    'status' => $request->status
                ]);
                session()->flash('success', 'Category Added Successfully');
                return redirect(route('category.index'));
            } else {
                $this->catModel::create([
                    'name' => $request->name,
                    'slug' => Str::slug($request->slug),
                    'description' => $request->description,
                    'meta_title' => $request->meta_title,
                    'meta_keyword' => $request->meta_keyword,
                    'meta_description' => $request->meta_description,
                    'status' => $request->status
                ]);
            }
            session()->flash('success', 'Category Added Successfully');
            return redirect(route('category.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
