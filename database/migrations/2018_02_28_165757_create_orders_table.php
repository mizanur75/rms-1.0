<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration{

    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->integer('item_id')->unsigned();
            $table->integer('qty');
            $table->integer('uom_id')->unsigned();
            $table->string('payment_method');
            $table->foreign('item_id')->reference('id')->on('items');
            $table->foreign('uom_id')->reference('id')->on('uoms');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('orders');
    }
}
