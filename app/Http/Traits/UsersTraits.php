<?php

namespace App\Http\Traits;


trait UsersTraits {

    public function getAllUsers()
    {
        return $this->userModel::get();
    }

    public function getUserById($userId)
    {
        return $this->userModel::findOrFail($userId);
    }
}
