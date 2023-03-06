<?php

namespace Database\Factories;

use App\Models\Companies;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompaniesFactory extends Factory
{
    protected $model = Companies::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'email'=> $this->faker->unique()->email(),
            'logo' => $this->faker->image(null, 100, 100, 'animals', true, true, 'cats', false, 'jpg'),
            'website' => $this->faker->url()
        ];
    }
}
