<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0;$i<15;$i++){
            DB::table('products')->insert([
                'name' =>$faker->lexify('Iphone ???'),
                'image'=>$faker->imageUrl($width = 640, $height = 480),
                'category_id'=>$faker->NumberBetween($min = 1, $max = 4),
                'quantity'=>$faker->NumberBetween($min = 20, $max = 100)
            ]);
        }
    }
}
