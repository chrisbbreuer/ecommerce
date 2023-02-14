<?php

use App\Actions\PlaceOrder;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Laravel\Sanctum\Sanctum;

it('can place an order', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user);

    $request = new Request([
        'notes' => 'Some notes',
        'product_id' => 1,
    ]);

    $response = (new PlaceOrder)($request);

    expect($response)->toBeInstanceOf(JsonResponse::class);
    expect($response->getStatusCode())->toBe(200);
});
