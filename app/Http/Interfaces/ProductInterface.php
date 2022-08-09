<?php
namespace App\Http\Interfaces;

interface ProductInterface {

    public function index();

    public function create();

    public function store($request);

    public function edit($productId);

    public function update($request);

    public function deleteImage($imageId);

    public function destroy($request);



}
