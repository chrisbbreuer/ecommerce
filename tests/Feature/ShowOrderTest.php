<?php

use App\Models\User;
use Laravel\Sanctum\Sanctum;

it('should successfully request the orders page', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user);

    $response = $this->get('/api/orders');

    $response->assertStatus(200);
});
