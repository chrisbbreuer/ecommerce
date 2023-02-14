<?php

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Laravel\Sanctum\Sanctum;

it('returns products', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user);

    $products = Product::factory(3)->make();
    $productMock = Mockery::mock(Product::class)
        ->shouldReceive('get')
        ->andReturn(Collection::make($products));

    $this->instance(Product::class, $productMock);

    $response = $this->getJson('/api/products');

    $response->assertStatus(200);
    $this->assertEquals($products->count(), 3);
})->group('controller');
