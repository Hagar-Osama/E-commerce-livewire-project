<?php

namespace App\Http\Traits;



trait SliderTraits {

    public function getAllSliders()
    {
        return $this->sliderModel::get();
    }

    public function getSliderById($sliderId)
    {
        return $this->sliderModel::findOrFail($sliderId);
    }
}
