<?php

namespace App\Http\Traits;

trait CategoryTraits {

    public function getAllCategories()
    {
        return $this->catModel::get();
    }

    public function getCategoryById($catId)
    {
        return $this->catModel::findOrFail();
    }
}
