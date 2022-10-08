<?php
namespace App\Http\Interfaces;

interface UsersInterface {

    public function index();

    public function create();

    public function store($request);

    public function edit($userId);

    public function update($request);

    public function destroy($request);



}
