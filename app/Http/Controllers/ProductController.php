<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\ProductInterface;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\DeleteProducImagetRequest;
use App\Http\Requests\DeleteProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productInterface;

    public function __construct(ProductInterface $productInterface)
    {
        $this->productInterface = $productInterface;

    }

    public function index()
    {
        return $this->productInterface->index();
    }

    public function create()
    {
        return $this->productInterface->create();
    }

    public function store(AddProductRequest $request)
    {
        return $this->productInterface->store($request);
    }

    public function edit($productId)
    {
        return $this->productInterface->edit($productId);
    }


    public function update(UpdateProductRequest $request)
    {
        return $this->productInterface->update($request);
    }

    public function updateProductColorQty(Request $request, $product_color_id)
    {
        return $this->productInterface->updateProductColorQty($request, $product_color_id);
    }

    public function deleteProductColorQty($product_color_id)
    {
        return $this->productInterface->deleteProductColorQty($product_color_id);
    }

    public function deleteImage($imageId)
    {
        return $this->productInterface->deleteImage($imageId);
    }

    public function destroy(DeleteProductRequest $request)
    {
        return $this->productInterface->destroy($request);
    }

}
