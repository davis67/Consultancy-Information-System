<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
             $table->string('task_name');
            $table->integer('task_status');
            $table->integer('priority');
            $table->integer('service_line');
            $table->string('start_date');
            $table->string('end_date');
            $table->integer('team');
            $table->string('start_time');
            $table->string('end_time');
            $table->integer('related_to');
            $table->string('description')->nullable();
            $table->string('assigned_to');
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
        Schema::dropIfExists('tasks');
    }
}
