<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->integer('staff_user_id');
            $table->string('gender')->nullable();
            $table->string('role');
            $table->string('phone_No')->nullable();
            $table->string('address')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->mediumtext('pic')->nullable();
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

        Schema::dropIfExists('staff');
    }
}
