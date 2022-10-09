<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\AdminInterface;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $adminInterface;

    public function __construct(AdminInterface $adminInterface)
    {
        $this->adminInterface = $adminInterface;
    }

    public function index()
    {
        return $this->adminInterface->index();
    }
}
