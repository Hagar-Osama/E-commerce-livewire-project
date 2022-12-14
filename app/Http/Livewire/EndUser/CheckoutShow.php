<?php

namespace App\Http\Livewire\EndUser;

use App\Mail\PlaceOrderMail;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Illuminate\Support\Str;

class CheckoutShow extends Component
{
    public $cart;
    public $productTotalPrice = 0;
    public $fullname, $email, $phone, $pincode, $address, $payment_mode = null, $payment_id = null;
    protected $listeners = ['validationAll', 'transactionEmit' => 'paidOnlineOrder'];

    public function paidOnlineOrder($transactionId)
    {
        $this->payment_id = $transactionId;
        $this->payment_mode = 'Paid By Paypal';
        $placeOrder =  $this->placeOrder();
        if ($placeOrder) {
            Cart::where('user_id', auth()->user()->id)->delete();
            try{
                $order = Order::findOrFail($placeOrder->id);
                Mail::to($order->email)->send(new PlaceOrderMail($order));

            }catch(Exception $e){

            }
            $this->emit('cartAddedOrUpdated');
            session()->flash('message', 'Order Placed Successfully');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Order Placed Successfully',
                'type' => 'success',
                'status' => 200
            ]);
            return redirect()->to('/thankyou');
        } else {
            DB::rollBack();
            $this->dispatchBrowserEvent('message', [
                'text' => 'something went wrong',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }



    public function rules()
    {
        return [
            'fullname' => 'required|max:100',
            'email' => 'required|email',
            'phone' => 'required',
            'pincode' => 'required',
            'address' => 'required|max:120'
        ];
    }

    public function validationAll()
    {
        $this->validate();
    }

    public function placeOrder()
    {
        DB::beginTransaction();
        $this->validate();
        $order =  Order::create([
            'user_id' => auth()->user()->id,
            'tracking_number' => 'amazon-' . Str::random(10),
            'fullname' => auth()->user()->name,
            'email' => auth()->user()->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'pincode' => $this->pincode,
            'status_message' => 'in progress',
            'payment_method' => $this->payment_mode,
            'payment_id' => $this->payment_id,

        ]);

        foreach ($this->cart as $cartItem) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'product_color_id' => $cartItem->product_color_id,
                'price' => $cartItem->products->selling_price,
                'quantity' => $cartItem->quantity,

            ]);
            if ($cartItem->product_color_id != NULL) {
                $cartItem->productColors()->where('id', $cartItem->product_color_id)->decrement('color_qty', $cartItem->quantity);
                $cartItem->products()->where('id', $cartItem->product_id)->decrement('qty', $cartItem->quantity);
            } else {
                $cartItem->products()->where('id', $cartItem->product_id)->decrement('qty', $cartItem->quantity);
            }
        }

        DB::commit();
        return $order;
    }


    public function cashOnDelivery()
    {
        $this->payment_mode = 'Cash on Delivery';
        $placeOrder =  $this->placeOrder();
        if ($placeOrder) {
            Cart::where('user_id', auth()->user()->id)->delete();
            try{
                $order = Order::findOrFail($placeOrder->id);
                Mail::to($order->email)->send(new PlaceOrderMail($order));

            }catch(Exception $e){

            }
            $this->emit('cartAddedOrUpdated');
            session()->flash('message', 'Order Placed Successfully');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Order Placed Successfully',
                'type' => 'success',
                'status' => 200
            ]);
            return redirect()->to('/thankyou');
        } else {
            DB::rollBack();
            $this->dispatchBrowserEvent('message', [
                'text' => 'something went wrong',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }

    public function render()
    {
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->pincode = auth()->user()->profile->zip_code;
        $this->address = auth()->user()->profile->address;
        $this->phone = auth()->user()->profile->phone;

        $this->productTotalPrice = $this->calculatingCartProducts();
        return view('livewire.end-user.checkout-show', ['productTotalPrice' => $this->productTotalPrice]);
    }

    public function calculatingCartProducts()
    {
        $this->productTotalPrice = 0;
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($this->cart as $cartItem) {
            $this->productTotalPrice += $cartItem->products->selling_price * $cartItem->quantity;
        }
        return $this->productTotalPrice;
    }
}
