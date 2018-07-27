<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOppsTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opps_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('task_name');
           $table->string('task_status');
           $table->string('priority');
           $table->string('service_line');
           $table->date('start_date');
           $table->date('end_date');
           $table->string('team');
           $table->string('related_to');
           $table->string('description')->nullable();
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
        Schema::dropIfExists('opps_tasks');
    }
}
