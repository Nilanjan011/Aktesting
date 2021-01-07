<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appoints', function (Blueprint $table) {
            $table->id();
            $table->string("Name");
            $table->string("Email");
            $table->date("Date_of_Birth");
            $table->string("Gender");
            $table->string("Contact");
            $table->string("Department")->nullable();
            $table->string("Test")->nullable();
            $table->date("Preferred_date");
            $table->string("Preferred_time")->nullable();
            $table->string("Address")->nullable();
            $table->string("Pincode")->nullable();
            $table->string("Description");
            $table->string("Pescription")->nullable();
            $table->string("Status")->default("Pending");
            $table->string("type")->nullable();
            $table->string("uploadStatus")->default("0");
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
        Schema::dropIfExists('appoints');
    }
}
