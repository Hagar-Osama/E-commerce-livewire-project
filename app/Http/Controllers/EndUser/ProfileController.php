<?php

namespace App\Http\Controllers\EndUser;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\ProfileInterface;
use App\Http\Requests\AddUserProfileRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private $profileInterface;

    public function __construct(ProfileInterface $profileInterface)
    {
        $this->profileInterface = $profileInterface;

    }

    public function index()
    {
        return $this->profileInterface->index();
    }

    public function store(AddUserProfileRequest $request)
    {
        return $this->profileInterface->store($request);

    }

}
