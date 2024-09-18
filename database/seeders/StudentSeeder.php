<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\table;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i=0; $i <5 ; $i++) { 
            DB::table('students')->insert([
                'name' => $faker->name ,
                'gender' => $faker->randomElement(['1','0']) ,
                'phone' => $faker->numerify('090#######') ,
                'address' => $faker->randomElement(['hà nội','phú đô','mễ trì','phú diễn','cầu diễn']) ,
                'image' =>'image.jpg' ,
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }
    }
}
