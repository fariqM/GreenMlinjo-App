<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FavouriteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' =>  1,
            'product_id' =>  rand(1, 50),
        ];
    }
}
