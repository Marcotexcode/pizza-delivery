<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRowOrderExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('row_order_extras', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('row_order_id');
            $table->unsignedBigInteger('extra_id');
            $table->foreign('row_order_id')->references('id')->on('row_orders')->onDelete('cascade');
            $table->foreign('extra_id')->references('id')->on('extras')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('row_order_extras');
    }
}
