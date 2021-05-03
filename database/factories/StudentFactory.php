<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;


class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'studentid' => $this->faker->randomNumber(5),
            'address' => $this->faker->address,
            'telephone' => $this->faker->randomNumber(7),
            'year' => $this->faker->numberBetween(7, 13)
        ];
    }
}
