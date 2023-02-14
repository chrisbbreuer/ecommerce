<?php

use App\Actions\AddOrder;
use Illuminate\Http\Request;

it('renders the add order page with the passed product id', function () {
    $request = new Request(['passedProduct' => 2]);

    $response = (new AddOrder)($request);

    $data = $response->toResponse($request)->original->getData();

    $this->assertEquals('Order/Add', $data['page']['component']);
    $this->assertEquals(2, $data['page']['props']['passedProduct']);
});
