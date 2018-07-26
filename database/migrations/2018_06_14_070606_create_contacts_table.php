<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('organisation_name');
            $table->string('country');
            $table->string('company_email')->unique;
            $table->string('address_street')->nullable();
            $table->string('address_city')->nullable();
            $table->string('address_state')->nullable();
            $table->string('address_postal_code')->nullable();
            $table->string('address_country')->nullable();
            $table->string('alt_address_street')->nullable();
            $table->string('alt_address_city')->nullable();
            $table->string('alt_address_state')->nullable();
            $table->string('alt_postal_code')->nullable();
            $table->string('alt_address_country')->nullable();
            $table->string('description')->nullable();
            $table->string('office_telephone')->unique();
            $table->string('mobile_telephone')->unique();
            $table->string('contactperson_name')->nullable();
            $table->string('job_title')->nullable();
            $table->string('email')->nullable();
            $table->string('department')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
