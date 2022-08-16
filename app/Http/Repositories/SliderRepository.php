<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\SliderInterface;
use App\Http\Traits\FilesTraits;
use App\Http\Traits\SliderTraits;
use App\Models\Slider;
use Exception;

class SliderRepository implements SliderInterface
{

    use SliderTraits;
    use FilesTraits;
    private $sliderModel;


    public function __construct(Slider $slider)
    {
        $this->sliderModel = $slider;
    }
    public function index()
    {

        return view('admin.slider.index', ['sliders' => $this->getAllSliders()]);
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store($request)
    {
        try {

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->hashName();
            $this->uploadFile($image, 'sliders', $imageName);

             $this->sliderModel::create([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $imageName,
                'status' => $request->status
            ]);
        }
            session()->flash('success', 'Slider Added Successfully');
            return redirect(route('slider.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($sliderId)
    {
        $slider = $this->getSliderById($sliderId);
        return view('admin.slider.edit', compact('slider'));
    }

    public function update($request)
    {

        try {
            $slider = $this->getSliderById($request->sliderId);
            
            $slider->update([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status
            ]);
            if($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->hashName();
                $this->uploadFile($image, 'sliders', $imageName, 'storage/sliders/'. $slider->image);

                 $slider->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'image' => isset($imageName) ? $imageName : $slider->image,
                    'status' => $request->status
                ]);
            }
            session()->flash('success', 'Slider Updated Successfully');
            return redirect(route('slider.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy($request)
    {
        $slider = $this->getSliderById($request->sliderId);
        $slider->delete();
        session()->flash('warning', 'Slider Deleted Successfully');
        return redirect(route('slider.index'));


    }
}
