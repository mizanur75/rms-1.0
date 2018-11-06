<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration{

    public function up(){
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->text('pre_address');
            $table->text('per_address');
            $table->string('sex');
            $table->string('identity');
            $table->foreign('category_id')
                  ->reference('id')->on('roles');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('employees');
    }
}
