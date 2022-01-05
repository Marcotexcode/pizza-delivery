<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pizzas')->insert([
            'name' => 'margherita',
            'ingrediants' => 'mozzarella, pomodoro, basilico',
            'price' => 5.20
        ]);
    }
}
