<?php
namespace App\Http\Interfaces;

interface OrdersInterface {

    public function index($request);

    public function show($orderId);

    public function updateStatus($request, $orderId);

    public function showInvoice($orderId);

    public function downloadInvoice($orderId);







}
