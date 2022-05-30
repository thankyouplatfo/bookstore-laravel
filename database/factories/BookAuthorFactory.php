<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookAuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'book_id'=>$this->faker->numberBetween(1,10),
            'author_id'=>$this->faker->numberBetween(1,10),
        ];
    }
}
