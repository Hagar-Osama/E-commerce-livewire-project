<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\OrdersInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $ordersInterface;

    public function __construct(OrdersInterface $ordersInterface)
    {
        $this->ordersInterface = $ordersInterface;

    }

    public function index(Request $request)
    {
        return $this->ordersInterface->index($request);
    }

    public function show($orderId)
    {
        return $this->ordersInterface->show($orderId);


    }
}
