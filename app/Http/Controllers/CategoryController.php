<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\CategoryInterface;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\DeleteCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryInterface;

    public function __construct(CategoryInterface $categoryInterface)
    {
        $this->categoryInterface = $categoryInterface;

    }

    public function index()
    {
        return $this->categoryInterface->index();
    }

    public function create()
    {
        return $this->categoryInterface->create();
    }

    public function store(AddCategoryRequest $request)
    {
        return $this->categoryInterface->store($request);
    }

    public function edit($catId)
    {
        return $this->categoryInterface->edit($catId);
    }


    public function update(UpdateCategoryRequest $request)
    {
        return $this->categoryInterface->update($request);
    }

    public function destroy(DeleteCategoryRequest $request)
    {
        return $this->categoryInterface->destroy($request);
    }

}
