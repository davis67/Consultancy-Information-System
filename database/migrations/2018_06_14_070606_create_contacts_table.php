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
            $table->string('contacts_name');
            $table->string('office_telephone')->unique();
            $table->string('mobile_telephone')->unique();
            $table->string('department');
            $table->string('job_title');
            $table->string('email');
            $table->string('client_name');
            $table->string('address_street')->nullable;
            $table->string('address_city');
            $table->string('address_state');
            $table->string('address_postal_code');
            $table->string('address_country');
            $table->string('alt_address_street')->nullable;
            $table->string('alt_address_city')->nullable;
            $table->string('alt_address_state')->nullable;
            $table->string('alt_postal_code')->nullable;
            $table->string('alt_address_country')->nullable;
            $table->string('description');
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
        Schema::dropIfExists('contacts');
    }
}
