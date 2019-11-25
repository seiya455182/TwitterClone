<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodoListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todo_list', function (Blueprint $table) {
           $table->increments('id');
           $table->timestamps();
           $table->unsignedInteger('user_id');
           $table->string('text',50)->unique()->null();

           $table->foreign('user_id')
               ->references('id')
               ->on('users')
               ->onDelete('cascade')
               ->onUpdate('cascade');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todo_list');
    }
}
