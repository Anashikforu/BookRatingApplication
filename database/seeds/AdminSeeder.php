<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'id' => 'ApplicationAdmin',
            'name' => 'Admin',
            'type' => 'admin',
            'password' => Hash::make('123456789')

        ]);
    }
}
