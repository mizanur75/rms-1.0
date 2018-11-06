<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    
    public function up(){
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('sub_title');
            $table->string('image')->default('default.png');
            $table->timestamps();
        });
    }


    public function down(){
        Schema::dropIfExists('sliders');
    }
}
