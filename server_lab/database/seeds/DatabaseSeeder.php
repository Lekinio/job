<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        DB::table('companies')->insert([
            'name' => str_random(10),
        ]);

        DB::table('locations')->insert([
            'name' => str_random(10),
        ]);

        DB::table('categories')->insert([
            'name' => str_random(10),
        ]);

        DB::table('adver_types')->insert([
            'name' => str_random(10),
        ]);

        DB::table('jobs')->insert([
            'name' => str_random(10),
            'body' => str_random(50),
            'salary' => '21',
            'user_id' => '1',
            'company_id' => '1',
            'location_id' => '1',
            'category_id' => '1',
            'adver_type_id' => '1'
        ]);
    }
}
