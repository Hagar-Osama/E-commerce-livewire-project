<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\SliderInterface;
use App\Http\Requests\AddSliderRequest;
use App\Http\Requests\deleteSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    private $sliderInterface;

    public function __construct(SliderInterface $sliderInterface)
    {
        $this->sliderInterface = $sliderInterface;

    }

    public function index()
    {
        return $this->sliderInterface->index();
    }

    public function create()
    {
        return $this->sliderInterface->create();
    }

    public function store(AddSliderRequest $request)
    {
        return $this->sliderInterface->store($request);
    }

    public function edit($sliderId)
    {
        return $this->sliderInterface->edit($sliderId);
    }


    public function update(UpdateSliderRequest $request)
    {
        return $this->sliderInterface->update($request);
    }

    public function destroy(deleteSliderRequest $request)
    {
        return $this->sliderInterface->destroy($request);
    }
}
