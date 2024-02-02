<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function checkout() {

    }

    public function plus(Order $order) {

        if($order->count >= 10) return back();

        $order->update([
            'count' => $order->count + 1
        ]);

        return back();

    }

    public function minus(Order $order) {

        if($order->count <= 1) return back();

        $order->update([
            'count' => $order->count - 1
        ]);

        return back();

    }
}
