<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\OrderInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $orderInterface;

    public function __construct(OrderInterface $orderInterface)
    {
        $this->orderInterface = $orderInterface;

    }

    public function index()
    {
        return $this->orderInterface->index();
    }

    public function show($orderId)
    {
        return $this->orderInterface->show($orderId);


    }

}

