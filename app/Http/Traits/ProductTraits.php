<?php

namespace App\Http\Traits;

trait ProductTraits {

    public function getAllProducts()
    {
        return $this->proModel::get();
    }

    public function getProductById($proId)
    {
        return $this->proModel::findOrFail($proId);
    }
}
