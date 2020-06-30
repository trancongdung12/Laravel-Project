<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
class ProductDescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=1;$i<17;$i++){
            DB::table('description_products')->insert([
                'product_id' =>$i,
                'content'=>$faker->text
            ]);
        }
    }
}
