<?php

namespace App\Actions;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ShowOrders extends Controller
{
    public function __invoke()
    {
        return Inertia::render('Order/Index');
    }
}
