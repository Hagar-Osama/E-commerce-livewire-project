<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\CategoryInterface;
use App\Http\Requests\AddCategoryRequest;
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
}
