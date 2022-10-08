<?php
namespace App\Http\Repositories;

use App\Http\Interfaces\AuthInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthRepository implements AuthInterface {

    private $userModel;
    public function __construct(User $user)
    {
        $this->userModel = $user;

    }
    public function registerPage()
    {
        return view('register');
    }

    public function register($request)
    {
        $user = $this->userModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin'
        ]);
        Auth::login($user);
        return redirect()->route('dashboard');
    }

    public function loginPage()
    {
        return view('login');
    }

    public function login($request)
    {

        $adminData = $request->only('name', 'password');
        if(auth()->attempt($adminData)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
        return back()->withErrors([
            'name' => 'The Provided Credentials Don\'t Match Our Record',
            'password' => 'The Provided Email Doesn\'t Match Our Record',
        ]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('loginPage');
    }
}



