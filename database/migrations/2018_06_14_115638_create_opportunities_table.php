<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpportunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opportunities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('opportunity_name');
            $table->integer('business_number');
            $table->string('client_name');
            $table->string('country');
            $table->string('sales_stage')->default('submitted');
            $table->string('date');
            $table->integer('OM_number');
            $table->double('revenue');
            $table->integer('currency');
            $table->integer('leads_name');
            $table->integer('internal_deadline');
            $table->integer('team');
            $table->string('probability');
            $table->integer('reference_number')->nullable;
            $table->string('next_step');
            $table->integer('number_of_licence')->nullable;
            $table->string('partners');
            $table->string('funded_by');
            $table->string('year');
            $table->string('description')->nullable;
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
        Schema::dropIfExists('opportunities');
    }
}
