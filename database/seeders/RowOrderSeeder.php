<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RowOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('row_orders')->insert([
            'order_header_id' => 1,
            'pizza_id' => 1,
            'extra_id' => 1,
            'quantity' => 3,
        ]);
    }
}
