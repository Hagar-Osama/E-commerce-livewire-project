<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\AuthInterface;
use App\Http\Requests\LoginAuthRequest;
use App\Http\Requests\RegisterAuthRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $authInterface;

    public function __construct(AuthInterface $authInterface)
    {
        $this->authInterface = $authInterface;

    }

    public function registerPage()
    {
        return $this->authInterface->registerPage();
    }

    public function register(RegisterAuthRequest $request)
    {
        return $this->authInterface->register($request);
    }

    public function loginPage()
    {
        return $this->authInterface->loginPage();
    }

    public function login(LoginAuthRequest $request)
    {
        return $this->authInterface->login($request);
    }


    public function logout()
    {
        return $this->authInterface->logout();
    }

    public function redirectToGoogleLoginPage()
    {
        return $this->authInterface->redirectToGoogleLoginPage();

    }

    public function loginViaGoogle()
    {
        return $this->authInterface->loginViaGoogle();

    }



}
