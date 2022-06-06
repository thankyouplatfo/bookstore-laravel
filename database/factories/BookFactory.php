<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BookFactory extends Factory
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
            "category_id" => $this->faker->numberBetween(1, 10),
            "publisher_id" => $this->faker->numberBetween(1, 10),
            "title" => $this->faker->realText(33),
            "isbn" => $this->faker->isbn13(),
            "desc" => $this->faker->realText(255),
            "publish_year" => $this->faker->dateTimeThisYear("+12 months"),
            "number_of_pages" => $this->faker->numberBetween(1, 255),
            "number_of_copies" => $this->faker->numberBetween(1, 255),
            //"bought" => $this->faker->number_format(0,1),
            "price" => $this->faker->numberBetween(1, 2590),
            "cover_image" => $this->faker->imageUrl(500, 500, Str::slug(config('app.name')), false),
        ];
    }
}
