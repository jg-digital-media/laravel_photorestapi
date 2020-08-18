<?php

use Illuminate\Database\Seeder;

class OwnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //connect to seeder and create 3 sets of test data
        factory(\App\Owner::class, 3)->create();
    }
}
