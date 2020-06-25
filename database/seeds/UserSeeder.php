<?php
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::table('users')->insert([
            'name' => 'Trần Công Dũng',
            'username' => 'dungx',
            'password' => Hash::make('123'),
            'role'=> 'user',
            'amount' => 0,
        ]);
        DB::table('users')->insert([
            'name' => $faker->name,
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'role'=> 'admin',
            'amount' => 0,
        ]);
    }
}
