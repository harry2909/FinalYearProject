<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i = 0; $i < 50; $i++){
            Student::create([
                'name' => $faker->name,
                'studentid' => $faker->randomNumber(5),
                'address' => $faker->address,
                'telephone' => $faker->randomNumber(7),
                'year' => $faker->numberBetween(7, 13)
            ]);
        }
    }
}
