<?php

namespace App\Http\Traits;

use App\Models\Brand;

trait BrandTraits {

    public function getAllBrands()
    {
        return Brand::get();
    }

    public function getBrandById($proId)
    {
        return Brand::findOrFail($proId);
    }
}
