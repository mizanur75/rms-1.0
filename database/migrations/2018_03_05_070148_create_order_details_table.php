<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_master_id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->integer('uom_id')->unsigned();
            $table->integer('qty');
            $table->string('price');
            $table->reference('order_master_id')->on('order_masters');
            $table->reference('item_id')->on('items');
            $table->reference('uom_id')->on('uoms');
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
        Schema::dropIfExists('order_details');
    }
}
