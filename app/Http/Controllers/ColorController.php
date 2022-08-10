<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\ColorInterface;
use App\Http\Requests\AddColorRequest;
use App\Http\Requests\DeleteColorRequest;
use App\Http\Requests\UpdateColorRequest;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    private $colorInterface;

    public function __construct(ColorInterface $colorInterface)
    {
        $this->colorInterface = $colorInterface;

    }

    public function index()
    {
        return $this->colorInterface->index();
    }

    public function create()
    {
        return $this->colorInterface->create();
    }

    public function store(AddColorRequest $request)
    {
        return $this->colorInterface->store($request);
    }

    public function edit($colorId)
    {
        return $this->colorInterface->edit($colorId);
    }


    public function update(UpdateColorRequest $request)
    {
        return $this->colorInterface->update($request);
    }

    public function destroy(DeleteColorRequest $request)
    {
        return $this->colorInterface->destroy($request);
    }
}
