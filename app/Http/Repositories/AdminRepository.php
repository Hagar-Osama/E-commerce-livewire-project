<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\AdminInterface;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Carbon;

class AdminRepository implements AdminInterface
{

    private $productModel;
    private $orderModel;
    private $categoryModel;
    private $brandModel;
    private $userModel;
    public function __construct(Product $product, Order $order, Category $category, Brand $brand, User $user)
    {
        $this->productModel = $product;
        $this->orderModel = $order;
        $this->categoryModel = $category;
        $this->brandModel = $brand;
        $this->userModel = $user;
    }

    public function index()
    {
        $totalProducts = $this->productModel::count();
        $totalCategories = $this->categoryModel::count();
        $brands = $this->brandModel::count();
        $allUsers = $this->userModel::count();
        $users = $this->userModel::where('role', 'user')->count();
        $admins = $this->userModel::where('role', 'admin')->count();
        $todayDate = Carbon::now()->format('Y-m-d');
        $currentMonth = Carbon::now()->format('m');
        $currentYear = Carbon::now()->format('Y');
        $totalOrders = $this->orderModel::count();
        $currentDateOrder = $this->orderModel::whereDate('created_at', $todayDate)->count();
        $currentMonthOrder = $this->orderModel::whereMonth('created_at', $currentMonth)->count();
        $currentYearOrder = $this->orderModel::whereYear('created_at', $currentYear)->count();

        return view('Admin.dashboard', compact(
            'totalProducts',
            'totalCategories',
            'brands',
            'allUsers',
            'users',
            'admins',
            'totalOrders',
            'currentDateOrder',
            'currentMonthOrder',
            'currentYearOrder'
        ));
    }
}
