<?php

use Illuminate\Database\Seeder;

class adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		  DB::table('admins')->insert([
            'name' => 'gakudai',
            'email' => 'admin1@mybooking.jp',
            'password' => bcrypt('Test@1234'),
            'tel' => '',
            'address' => '',

            'shop_id' => '1',
        ]);
		  DB::table('admins')->insert([
            'name' => 'karasuma',
            'email' => 'admin2@mybooking.jp',
            'password' => bcrypt('Test@1234'),
            'tel' => '',
            'address' => '',

            'shop_id' => '2',
        ]);

		  DB::table('admins')->insert([
            'name' => 'toyonaka',
            'email' => 'admin3@mybooking.jp',
            'password' => bcrypt('Test@1234'),
            'tel' => '',
            'address' => '',

            'shop_id' => '3',
        ]);

        //
    }
}
