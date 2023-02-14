<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data() as $data) {
            \App\Models\User::factory()->create($data);
        }

        \App\Models\Product::factory(2)->create();
    }

    public function data()
    {
        $foods = ['Pizza Tuna & Onions', 'Pizza Hawaii',  'Potato Gratin', 'Fries'];

        return [
            [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'favorite_food' => Arr::random($foods),
            ],
            [
                'name' => 'Test User2',
                'email' => 'test@example2.com',
                'favorite_food' => Arr::random($foods),
            ],
        ];
    }
}
