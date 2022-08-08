<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\CategoryInterface;
use App\Http\Interfaces\ProductInterface;
use App\Http\Traits\BrandTraits;
use App\Http\Traits\CategoryTraits;
use App\Http\Traits\FilesTraits;
use App\Http\Traits\ProductTraits;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Support\Str;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductInterface
{

    use FilesTraits;
    use CategoryTraits;
    use ProductTraits;
    use BrandTraits;
    private $proModel;
    private $imageModel;

    public function __construct(Product $product, Category $category, Image $image)
    {
        $this->proModel = $product;
        $this->catModel = $category;
        $this->imageModel = $image;
    }
    public function index()
    {
        $products = $this->getAllProducts();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->getAllCategories();
        $brands = $this->getAllBrands();
        return view('admin.product.create', compact('categories', 'brands'));
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $product =  $this->proModel::create([
                'name' => $request->name,
                'slug' => Str::slug($request->slug),
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'trendy' => $request->trendy,
                'price' => $request->price,
                'qty' => $request->qty,
                'selling_price' => $request->selling_price,
                'brief' => $request->brief,
                'description' => $request->description,
                'meta_title' => $request->meta_title,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
                'status' => $request->status
            ]);
            $images = $request->file('images');
            if ($request->hasFile('images')) {

                foreach ($images as $img) {
                    $imageName = $img->hashName();
                    $this->uploadFile($img, 'products', $imageName);
                    $this->imageModel::create([
                        'image' => $imageName,
                        'imageable_id' => $product->id,
                        'imageable_type' => Product::class
                    ]);
                }
            }
            DB::commit();
            session()->flash('success', 'Product Added Successfully');
            return redirect(route('product.index'));
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($proId)
    {

        return view('admin.product.edit', compact('product'));
    }

    public function update($request)
    {
        // dd($request);

        try {
            $category = $this->getCategoryById($request->catId);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->hashName();
                $this->uploadFile($image, 'categories', $imageName, 'storage/categories/' . $category->image);
                $category->update([
                    'name' => $request->name,
                    'slug' => Str::slug($request->slug),
                    'description' => $request->description,
                    'image' => isset($imageName) ? $imageName : $category->image,
                    'meta_title' => $request->meta_title,
                    'meta_keyword' => $request->meta_keyword,
                    'meta_description' => $request->meta_description,
                    'status' => $request->status
                ]);
                session()->flash('success', 'Category Updated Successfully');
                return redirect(route('category.index'));
            } else {
                $category->update([
                    'name' => $request->name,
                    'slug' => Str::slug($request->slug),
                    'description' => $request->description,
                    'meta_title' => $request->meta_title,
                    'meta_keyword' => $request->meta_keyword,
                    'meta_description' => $request->meta_description,
                    'status' => $request->status
                ]);
            }
            session()->flash('success', 'Category Updated Successfully');
            return redirect(route('category.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
    }
}
