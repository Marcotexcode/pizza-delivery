<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRemoveExtraToRowOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('row_orders', function (Blueprint $table) {
            $table->dropForeign('row_orders_extra_id_foreign');
            $table->dropColumn('extra_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('row_orders', function (Blueprint $table) {
            //
        });
    }
}
