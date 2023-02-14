<?php

namespace App\Actions;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ShowSuccessOrder extends Controller
{
    public function __invoke($id)
    {
        return Inertia::render('Order/Success', [
            'id' => $id,
        ]);
    }
}
