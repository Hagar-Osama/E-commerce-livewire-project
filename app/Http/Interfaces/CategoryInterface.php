<?php
namespace App\Http\Interfaces;

interface CategoryInterface {

    public function index();

    public function create();

    public function store($request);

    public function edit($catId);

    public function update($request);


}
