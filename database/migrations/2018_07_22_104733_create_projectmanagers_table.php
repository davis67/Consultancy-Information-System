<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectmanagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projectmanagers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('step1_contract');
            $table->string('step1_inceptionreport');
            $table->string('step1_kickoffmeeting');
            $table->string('step2_kickoffmeeting')->nullable();
            $table->string('step2_deliverables')->nullable();
            $table->string('step2_milestones')->nullable();
            $table->string('step3_kickoffmeeting')->nullable();
            $table->string('step3_deliverables')->nullable();
            $table->string('step3_milestones')->nullable();
            $table->integer('project_id');
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
        Schema::dropIfExists('projectmanagers');
    }
}
