<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('discounts')->insert([
            'code' =>'BANCUADUNG',
            'percent'=>0.25
        ]);
        DB::table('discounts')->insert([
            'code' =>'PNV21A',
            'percent'=>0.5
        ]);
    }
}
