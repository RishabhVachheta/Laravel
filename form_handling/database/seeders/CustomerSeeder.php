<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 30; $i++) {
            $customer = new Customer;
            $customer->name = $faker->name;
            $customer->email = $faker->email;
            $customer->gender = "M";
            $customer->address = $faker->address;
            $customer->country = $faker->country;
            $customer->state = $faker->state;
            $customer->dob = $faker->date;
            $customer->password = $faker->password;
            $customer->save();
        }
    }
}
