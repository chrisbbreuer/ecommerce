<?php

use App\Models\User;
use Laravel\Sanctum\Sanctum;

it('should successfully request the products page', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user);

    $response = $this->get('/api/products');

    $response->assertStatus(200);
});
