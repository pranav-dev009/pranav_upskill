<?php

namespace Database\Factories;

use App\Models\Companies;
use App\Models\Employees;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeesFactory extends Factory
{
    protected $model = Employees::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->word(),
            'lastname' => $this->faker->word(),
            'company_id' => Companies::all()->random()->id
        ];
    }
}
