<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RowOrderExtraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('row_order_extras')->insert([
            'row_order_id' => 1,
            'extra_id' => 1,
        ]);
    }
}
