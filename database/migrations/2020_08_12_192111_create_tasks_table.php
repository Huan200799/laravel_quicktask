<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp_tasks', function (Blueprint $table) {
             $table->increments('task_id');
            $table->string('name');
            $table->integer('task_id_user')->unsigned();
            $table->foreign('task_id_user')->references(
                'id')->on('vp_users')->onDelete('cascade');
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
        Schema::dropIfExists('vp_tasks');
    }
}
