<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $minqty = rand(1, 20);
        $maxqty = $minqty + rand(1, 10);
        $minprc = rand(1000, 100000);
        $maxprc = $minprc + rand(1000, 10000);
        return [
            'title' =>  $this->faker->company(),
            'unit' =>  'Kg',
            'sub_unit' =>  'pcs',
            'description' =>  $this->faker->text(),
            'min_qty_per_unit' =>  $minqty,
            'max_qty_per_unit' =>  $maxqty,
            'min_price' => $minprc,
            'max_price' =>  $maxprc,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ];
    }
}
