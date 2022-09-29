<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\OrderInterface;
use App\Models\Order;

class OrderRepository implements OrderInterface
{

    private $orderModel;

    public function __construct(Order $order)
    {
        $this->orderModel = $order;

    }
    public function index()
    {
        $orders  = $this->orderModel::where('user_id', auth()->user()->id)->paginate(10);
        return view('endUser.orders.index', compact('orders'));
    }

    public function show($orderId)
    {
        $order  = $this->orderModel::where([['user_id', auth()->user()->id],['id', $orderId]])->first();
        return view('endUser.orders.show', compact('order'));
    }

}
