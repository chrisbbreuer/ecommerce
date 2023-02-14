<?php

namespace App\Actions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AddOrder extends Controller
{
    public function __invoke(Request $request)
    {
        return Inertia::render('Order/Add', [
            'passedProduct' => (int) ($request->passedProduct ?? 1),
        ]);
    }
}
