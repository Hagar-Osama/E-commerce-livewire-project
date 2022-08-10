<?php

namespace App\Http\Traits;


trait ColorTraits {

    public function getAllColors()
    {
        return $this->colorModel::get();
    }

    public function getColorById($colorId)
    {
        return $this->colorModel::findOrFail($colorId);
    }
}
