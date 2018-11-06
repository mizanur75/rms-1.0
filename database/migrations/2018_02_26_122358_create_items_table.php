<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->string('name');
            $table->text('description');
            $table->double('price');
            $table->integer('uom_id')->unsigned();
            $table->string('image');
            $table->string('uom');
            $table->foreign('category_id')
                    ->reference('id')->on('categories')
                    ->onDelete('cascade');
            $table->foreign('uom_id')
                    ->reference('id')
                    ->on('uoms')
                    ->onDelete('cascade');

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
        Schema::dropIfExists('items');
    }
}
