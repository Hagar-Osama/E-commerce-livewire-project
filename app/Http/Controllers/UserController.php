<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\UsersInterface;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\DeleteUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userInterface;

    public function __construct(UsersInterface $userInterface)
    {
        $this->userInterface = $userInterface;

    }

    public function index()
    {
        return $this->userInterface->index();
    }

    public function create()
    {
        return $this->userInterface->create();
    }

    public function store(AddUserRequest $request)
    {
        return $this->userInterface->store($request);
    }

    public function edit($userId)
    {
        return $this->userInterface->edit($userId);
    }


    public function update(UpdateUserRequest $request)
    {
        return $this->userInterface->update($request);
    }

    public function destroy(DeleteUserRequest $request)
    {
        return $this->userInterface->destroy($request);
    }
}
