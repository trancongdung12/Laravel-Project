<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories = ['Điện thoại','Tai Nghe','Củ sạc','Thẻ nhớ'];
        for($i=0;$i<4;$i++){
            DB::table('categories')->insert([
                'name' =>$categories[$i]
            ]);
        }

    }
}
