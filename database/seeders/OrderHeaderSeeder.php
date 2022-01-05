<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_headers')->insert([
            'user_id' => 1,
            'address' => 'via Nazionale',
            'phone' => '03455654'
        ]);
    }
}
