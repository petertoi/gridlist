<?php

namespace Database\Factories;

use App\Models\GridList;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GridListFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GridList::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->words(3),
            'user_id' => 1,
        ];
    }
}
