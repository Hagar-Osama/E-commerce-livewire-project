<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\CategoryInterface;
use App\Http\Interfaces\ProductInterface;
use App\Http\Traits\BrandTraits;
use App\Http\Traits\CategoryTraits;
use App\Http\Traits\FilesTraits;
use App\Http\Traits\ProductTraits;
use App\Models\Category;
use App\Models\Color;
use App\Models\Image;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\ProductColor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductRepository implements ProductInterface
{

    use FilesTraits;
    use CategoryTraits;
    use ProductTraits;
    use BrandTraits;
    private $proModel;
    private $imageModel;
    private $colorModel;
    private $productColor;


    public function __construct(Product $product, Category $category, Image $image, Color $color, ProductColor $ProductColor)
    {
        $this->proModel = $product;
        $this->catModel = $category;
        $this->imageModel = $image;
        $this->colorModel = $color;
        $this->productColor = $ProductColor;
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
        $colors = $this->colorModel::where('status', 'visible')->get();
        return view('admin.product.create', compact('categories', 'brands', 'colors'));
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
                    $this->uploadFile($img, 'products/' . $product->name, $imageName);
                    $this->imageModel::create([
                        'image' => $imageName,
                        'imageable_id' => $product->id,
                        'imageable_type' => Product::class
                    ]);
                }
            }
            foreach ($request->colors as $key => $color) {
                $this->productColor::create([
                    'product_id' => $product->id,
                    'color_id' => $color,
                    'color_qty' => $request->color_qty[$key] ?? 0 //$key here is the color_id to make sure that this color belongs to these quantites
                    // and if he inserted no quantity zero will be stored instead

                ]);
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
        $product = $this->getProductById($proId);
        $categories = $this->getAllCategories();
        $brands = $this->getAllBrands();
        //now we need to show the colors that is not chosen in the add process
        $productColor = $this->productColor::pluck('color_id')->toArray();
        $colors = $this->colorModel::whereNotIn('id', $productColor)->get();
        return view('admin.product.edit', compact('product', 'categories', 'brands', 'colors'));
    }

    public function update($request)
    {


        DB::beginTransaction();
        try {
            $product = $this->getProductById($request->productId);
            $product->update([
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
                    $this->uploadFile($img, 'products/' . $product->name, $imageName);
                    $this->imageModel::create([
                        'image' => $imageName,
                        'imageable_id' => $product->id,
                        'imageable_type' => Product::class
                    ]);
                }
            }
            foreach ((array) $request->colors as $key => $color) {
                $this->productColor::create([
                    'product_id' => $product->id,
                    'color_id' => $color,
                    'color_qty' => $request->color_qty[$key] ?? 0 //$key here is the color_id to make sure that this color belongs to these quantites
                    // and if he inserted no quantity zero will be stored instead

                ]);
            }
            DB::commit();
            session()->flash('success', 'Product Updated Successfully');
            return redirect(route('product.index'));
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function updateProductColorQty($request, $product_color_id)
    {
        // /first we need to check that the product id is the same id in the productcolors table
        // /there is a problem here
        $productColorData = ProductColor::find($product_color_id)->first();
        $productColorData->update([
            'color_qty' => $request->color_qty
        ]);
        return response()->json(['message' => 'Product Color Quantity Updated Successfully']);
    }

    public function deleteProductColorQty($product_color_id)
    {
        $productColor = ProductColor::findOrFail($product_color_id);
        $productColor->delete();
        return response()->json(['message' => 'Product Color Quantity deleted Successfully']);
    }

    public function deleteImage($imageId)
    {
        $image = $this->imageModel::findOrFail($imageId);
        $path = 'storage/products/' . $image->imageable->name . '/' . $image->image;
        if (File::exists($path)) {
            $this->deleteFile($path);
        }
        $image->delete();
        session()->flash('success', 'Product Image Deleted Successfully');
        return redirect(route('product.index'));
    }

    public function destroy($request)
    {
        $product = $this->getProductById($request->productId);
        $product->delete();
        $this->imageModel::destroy($product->images);
        if ($product->images) {
            foreach ($product->images as $image) {
                $path = 'storage/products/' . $product->name . '/' . $image->image;
                if (File::exists($path)) {
                    $this->deleteFile($path);
                }
            }
        }
        session()->flash('success', 'Product Deleted Successfully');
        return redirect(route('product.index'));
    }
}
