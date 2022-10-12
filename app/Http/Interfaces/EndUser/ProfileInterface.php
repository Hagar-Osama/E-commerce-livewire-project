<?php
namespace App\Http\Interfaces\EndUser;

interface ProfileInterface {

    public function index();

    public function store($request);

    public function changePasswordIndex();

    public function changePassword($request);





}
