<?php
namespace App\Http\Interfaces;

interface SliderInterface {

    public function index();

    public function create();

    public function store($request);

    public function edit($sliderId);

    public function update($request);

    public function destroy($request);



}
