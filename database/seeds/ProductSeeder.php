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
        //Phone
        DB::table('products')->insert([
                'name' =>'Iphone XR',
                'slug' =>'iphone-xr',
                'image'=>'public/product/phone_1.jpeg',
                'category_id'=>1,
                'quantity'=>$faker->NumberBetween($min = 20, $max = 100),
                'price'=>$faker->NumberBetween($min = 9000000, $max = 15000000)
            ]);
            DB::table('products')->insert([
                'name' =>'Iphone X',
                'slug' =>'iphone-x',
                'image'=>'public/product/phone_2.jpeg',
                'category_id'=>1,
                'quantity'=>$faker->NumberBetween($min = 20, $max = 100),
                'price'=>$faker->NumberBetween($min = 5000000, $max = 10000000)
            ]);
            DB::table('products')->insert([
                'name' =>'Iphone 11',
                'slug' =>'iphone-11-red',
                'image'=>'public/product/phone_3.jpeg',
                'category_id'=>1,
                'quantity'=>$faker->NumberBetween($min = 20, $max = 100),
                'price'=>$faker->NumberBetween($min = 15000000, $max = 20000000)
            ]);
            DB::table('products')->insert([
                'name' =>'Iphone 11',
                'slug' =>'iphone-11-green',
                'image'=>'public/product/phone_4.jpeg',
                'category_id'=>1,
                'quantity'=>$faker->NumberBetween($min = 20, $max = 100),
                'price'=>$faker->NumberBetween($min = 15000000, $max = 20000000)
            ]);

            //Airpod
            DB::table('products')->insert([
                'name' =>'Airpod',
                'slug' =>'airpod-bo',
                'image'=>'public/product/airpod_1.jpg',
                'category_id'=>2,
                'quantity'=>$faker->NumberBetween($min = 20, $max = 100),
                'price'=>$faker->NumberBetween($min = 5000000, $max = 8000000)
            ]);
            DB::table('products')->insert([
                'name' =>'Airpod 2',
                'slug' =>'airpod-2',
                'image'=>'public/product/airpod_2.jpeg',
                'category_id'=>2,
                'quantity'=>$faker->NumberBetween($min = 20, $max = 100),
                'price'=>$faker->NumberBetween($min = 5000000, $max = 8000000)
            ]);
            DB::table('products')->insert([
                'name' =>'Airpod Pink',
                'slug' =>'airpod-pink',
                'image'=>'public/product/airpod_3.jpg',
                'category_id'=>2,
                'quantity'=>$faker->NumberBetween($min = 20, $max = 100),
                'price'=>$faker->NumberBetween($min = 5000000, $max = 8000000)
            ]);
            DB::table('products')->insert([
                'name' =>'Airpod Bear',
                'slug' =>'airpod-bear',
                'image'=>'public/product/airpod_4.jpg',
                'category_id'=>2,
                'quantity'=>$faker->NumberBetween($min = 20, $max = 100),
                'price'=>$faker->NumberBetween($min = 5000000, $max = 8000000)
            ]);

            //Watch
            DB::table('products')->insert([
                'name' =>'Apple Watch S4',
                'slug' =>'apple-watch-s4',
                'image'=>'public/product/watch_1.jpg',
                'category_id'=>3,
                'quantity'=>$faker->NumberBetween($min = 20, $max = 100),
                'price'=>$faker->NumberBetween($min = 8000000, $max = 10000000)
            ]);
            DB::table('products')->insert([
                'name' =>'Apple Watch S5',
                'slug' =>'apple-watch-s5',
                'image'=>'public/product/watch_2.jpg',
                'category_id'=>3,
                'quantity'=>$faker->NumberBetween($min = 20, $max = 100),
                'price'=>$faker->NumberBetween($min = 8000000, $max = 10000000)
            ]);
            DB::table('products')->insert([
                'name' =>'Apple Watch 5 GPS',
                'slug' =>'apple-watch-5-gps',
                'image'=>'public/product/watch_3.jpg',
                'category_id'=>3,
                'quantity'=>$faker->NumberBetween($min = 20, $max = 100),
                'price'=>$faker->NumberBetween($min = 8000000, $max = 10000000)
            ]);
            DB::table('products')->insert([
                'name' =>'Apple Watch Nike',
                'slug' =>'apple-watch-nike',
                'image'=>'public/product/watch_4.jpg',
                'category_id'=>3,
                'quantity'=>$faker->NumberBetween($min = 20, $max = 100),
                'price'=>$faker->NumberBetween($min = 8000000, $max = 10000000)
            ]);
            //Charge
            DB::table('products')->insert([
                'name' =>'Củ Sạc 1',
                'slug' =>'cu-sac-phone-1',
                'image'=>'public/product/charge_1.jpg',
                'category_id'=>4,
                'quantity'=>$faker->NumberBetween($min = 50, $max = 100),
                'price'=>$faker->NumberBetween($min = 100000, $max = 200000)
            ]);
            DB::table('products')->insert([
                'name' =>'Củ Sạc 2',
                'slug' =>'cu-sac-iphone-2',
                'image'=>'public/product/charge_2.jpg',
                'category_id'=>4,
                'quantity'=>$faker->NumberBetween($min = 50, $max = 100),
                'price'=>$faker->NumberBetween($min = 100000, $max = 200000)
            ]);
            DB::table('products')->insert([
                'name' =>'Củ Sạc 3',
                'slug' =>'cu-sac-iphone-3',
                'image'=>'public/product/charge_3.jpg',
                'category_id'=>4,
                'quantity'=>$faker->NumberBetween($min = 50, $max = 100),
                'price'=>$faker->NumberBetween($min = 100000, $max = 200000)
            ]);
            DB::table('products')->insert([
                'name' =>'Củ Sạc 4',
                'slug' =>'cu-sac-iphone-4',
                'image'=>'public/product/charge_4.jpg',
                'category_id'=>4,
                'quantity'=>$faker->NumberBetween($min = 50, $max = 100),
                'price'=>$faker->NumberBetween($min = 100000, $max = 200000)
            ]);
    }
}
