<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
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
            Teacher::create([
                'name' => $faker->name,
                'teacherid' => $faker->randomNumber(5),
                'subject' => $faker->sentence
            ]);
        }
    }
}
