<?php

namespace Database\Seeders;

use App\Models\Employee;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create(); 

        for ($i = 0; $i < 10; $i++) {
            Employee::create([
                'name' => $faker->name, 
                'email' => $faker->unique()->safeEmail, 
                'phone' => $faker->unique()->numerify('##########'),
                'dob' => $faker->dateTimeBetween('-40 years', '-18 years')->format('Y-m-d'), 
                'image_path' => 'path/to/image.jpg', 
            ]);
        }
    }
}
