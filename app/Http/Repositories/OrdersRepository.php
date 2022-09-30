<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\OrdersInterface;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class OrdersRepository implements OrdersInterface
{

    private $orderModel;

    public function __construct(Order $order)
    {
        $this->orderModel = $order;
    }
    public function index($request)
    {
        $currentDate = Carbon::now()->format('Y-m-d');
        $orders  = $this->orderModel::when($request->date != null, function ($q) use ($request) {

            return $q->whereDate('created_at', $request->date);
        }, function ($q) use ($currentDate) {
            return $q->whereDate('created_at', $currentDate);
        })->when($request->status != null, function ($q) use ($request) {
            return $q->where('status_message', $request->status);
        })->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function show($orderId)
    {
        $order  = $this->orderModel::where('id', $orderId)->first();
        return view('admin.orders.show', compact('order'));
    }
}
