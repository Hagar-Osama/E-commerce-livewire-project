<?php
namespace App\Http\Interfaces;

interface ProductInterface {

    public function index();

    public function create();

    public function store($request);

    public function edit($productId);

    public function update($request);

    public function updateProductColorQty($request, $product_color_id);

    public function deleteProductColorQty($product_color_id);

    public function deleteImage($imageId);

    public function destroy($request);



}
