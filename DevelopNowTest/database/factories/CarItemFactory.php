<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CarItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id'=>$this->faker->randomNumber ,
        ];
    }
}
