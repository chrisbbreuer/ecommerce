<?php

namespace App\Actions;

use App\Http\Controllers\Controller;
use App\Models\Order;

class GetOrders extends Controller
{
    public function __invoke()
    {
        $data = Order::with('product')->get();

        return response()->json([
            'data' => $data,
        ], 200);
    }
}
