<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\ProfileInterface;
use App\Models\Profile;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileRepository implements ProfileInterface
{

    private $profileModel;
    private $userModel;

    public function __construct(Profile $profile, User $user)
    {
        $this->profileModel = $profile;
        $this->userModel = $user;
    }
    public function index()
    {

        return view('endUser.users.profile');
    }

    public function store($request)
    {
        DB::beginTransaction();
        $user = $this->userModel::findOrFail(auth()->user()->id);
        try {
            $user->update([
                'name' => $request->name,
            ]);

            $this->profileModel::updateOrCreate(['user_id' => $user->id],[
                'phone' => $request->phone,
                'address' => $request->address,
                'zip_code' => $request->zip_code,

            ]);
            DB::commit();
            session()->flash('success', 'Profile Details Saved Successfully');
            return redirect()->back();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function changePasswordIndex()
    {
        return view('endUser.users.changePassword');
    }

    public function changePassword($request)
    {
        $currentPasswordCheck = Hash::check($request->current_password, auth()->user()->password);
        if($currentPasswordCheck)
        {
            $user = $this->userModel::findOrFail(auth()->user()->id);
            $user->update([
                'password' => Hash::make($request->password)
            ]);
            session()->flash('success', 'User Password Updated Successfully');
            return redirect()->back();


        }else{
            session()->flash('error', 'User Current Password Doesnt Match With The Old One');
            return redirect()->back();
        }




    }
}
