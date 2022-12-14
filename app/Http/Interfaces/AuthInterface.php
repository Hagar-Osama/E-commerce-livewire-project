<?php
namespace App\Http\Interfaces;

interface AuthInterface {

    public function registerPage();

    public function register($request);

    public function loginPage();

    public function login($request);

    public function logout();

    public function redirectToGoogleLoginPage();

    public function loginViaGoogle();

    public function redirectToGithubLoginPage();

    public function loginViaGithub();

    public function redirectToFacebookLoginPage();

    public function loginViaFacebook();



}
