<?php

namespace App\Actions;

use App\Http\Controllers\Controller;
use App\Models\Product;

class GetProducts extends Controller
{
    public function __invoke()
    {
        $data = Product::all();

        return response()->json([
            'data' => $data,
        ], 200);
    }
}
