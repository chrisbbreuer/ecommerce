<?php

namespace App\Actions;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class PlaceOrder extends Controller
{
    public function __invoke(Request $request)
    {
        $order = Order::create(array_merge([
            'notes' => $request->notes,
            'product_id' => $request->product_id,
            'user_id' => auth()->user()->id,
        ]));

        return response()->json([
            'data' => $order->toArray(),
            'message' => 'Order placed successfully',
        ], 200);
    }
}
