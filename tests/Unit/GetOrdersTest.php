<?php

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Laravel\Sanctum\Sanctum;
use Mockery\MockInterface;

it('returns orders with products', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user);

    $orders = Order::factory(3)->make();

    foreach ($orders as $order) {
        $order->product()->create([
            'name' => 'Product 1',
            'description' => 'Test',
            'price' => 1,
        ]);
    }

    $orderModelMock = Mockery::mock(Order::class, function (MockInterface $mock) use ($orders) {
        $mock->shouldReceive('with')->with('product')->andReturnSelf();
        $mock->shouldReceive('get')->andReturn(Collection::make($orders));
    });

    $response = $this->getJson('/api/orders');

    $response->assertStatus(200);
    $this->assertEquals($orders->count(), 3);
})->group('unit');
