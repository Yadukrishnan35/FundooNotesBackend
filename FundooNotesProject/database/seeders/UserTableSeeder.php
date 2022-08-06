<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,5) as $index) {
            DB::table('users')->insert([
            'firstname' => $faker->name,
            'lastname'=>$faker->name,
            'email'=>$faker->unique()->email,
            'password'=>$faker->unique()->password
        ]);
    }
}

    // public function run()
    // {
    //     DB::table('users')->insert([
    //         'firstname'=>Str::random(10),
    //         'lastname'=>Str::random(10),
    //         'email'=>Str::random(10),
    //         'password'=>Str::random(10),
    //     ]);
        
    // }

}
