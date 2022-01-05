<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRowOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('row_orders', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('order_header_id'); 
            $table->unsignedBigInteger('pizza_id');
            $table->unsignedBigInteger('extra_id');
            $table->integer('quantity');
            $table->foreign('order_header_id')->references('id')->on('order_headers')->onDelete('cascade');
            $table->foreign('pizza_id')->references('id')->on('pizzas')->onDelete('cascade');
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
        Schema::dropIfExists('row_orders');
    }
}
