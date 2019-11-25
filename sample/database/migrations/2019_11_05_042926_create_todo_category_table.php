<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodoCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('todo_category', function (Blueprint $table) {
     $table->bigincrements('id');
     $table->timestamps();
     $table->unsignedInteger('todo_id');
     $table->string('text',20)->unique()->null();

     $table->foreign('todo_id')
     ->references('id')
     ->on('todo_list')
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
        Schema::dropIfExists('todo_category');
    }
}
