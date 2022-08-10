<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\ColorInterface;
use App\Http\Traits\ColorTraits;
use App\Models\Color;
use Exception;

class ColorRepository implements ColorInterface
{

    use ColorTraits;
    private $colorModel;


    public function __construct(Color $color)
    {
        $this->colorModel = $color;
    }
    public function index()
    {

        return view('admin.color.index', ['colors' => $this->getAllColors()]);
    }

    public function create()
    {
        return view('admin.color.create');
    }

    public function store($request)
    {

        try {
             $this->colorModel::create([
                'name' => $request->name,
                'code' => $request->code,
                'status' => $request->status
            ]);
            session()->flash('success', 'Color Added Successfully');
            return redirect(route('color.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($colorId)
    {
        $color = $this->getColorById($colorId);
        return view('admin.color.edit', compact('color'));
    }

    public function update($request)
    {

        try {
            $color = $this->getColorById($request->colorId);
            $color->update([
                'name' => $request->name,
                'code' => $request->code,
                'status' => $request->status
            ]);

            session()->flash('success', 'Color Updated Successfully');
            return redirect(route('color.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy($request)
    {
        $color = $this->getColorById($request->colorId);
        $color->delete();
        session()->flash('warning', 'Color Deleted Successfully');
        return redirect(route('color.index'));


    }
}
