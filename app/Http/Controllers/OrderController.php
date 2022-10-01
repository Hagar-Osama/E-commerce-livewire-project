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

    public function updateStatus(Request $request, $orderId)
    {
        return $this->ordersInterface->updateStatus($request, $orderId);


    }

    public function showInvoice($orderId)
    {
        return $this->ordersInterface->showInvoice($orderId);

    }

    public function downloadInvoice($orderId)
    {
        return $this->ordersInterface->downloadInvoice($orderId);

    }


}
