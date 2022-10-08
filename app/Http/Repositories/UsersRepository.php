<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\UsersInterface;
use App\Http\Traits\UsersTraits;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class UsersRepository implements UsersInterface
{

    use UsersTraits;
    private $userModel;


    public function __construct(User $user)
    {
        $this->userModel = $user;
    }
    public function index()
    {

        return view('admin.users.index', ['users' => $this->getAllUsers()]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store($request)
    {

        try {
            $this->userModel::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role
            ]);
            session()->flash('success', 'User Added Successfully');
            return redirect(route('users.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($userId)
    {
        $user = $this->getUserById($userId);
        return view('admin.users.edit', compact('user'));
    }

    public function update($request)
    {

        try {
            $user = $this->getUserById($request->userId);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role
            ]);

            session()->flash('success', 'User Updated Successfully');
            return redirect(route('users.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy($request)
    {
        $user = $this->getUserById($request->userId);
        $user->delete();
        session()->flash('warning', 'User Deleted Successfully');
        return redirect(route('users.index'));


    }
}
