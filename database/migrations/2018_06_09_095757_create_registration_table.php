<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('registration_number',100)->index();
            $table->integer('user_id');
            $table->integer('status')->default(1);
            $table->string('left_rid')->nullable();
            $table->string('right_rid')->nullable();
            $table->string('parent_rid')->nullable();
            $table->integer('rank_id')->default(1);
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
        Schema::dropIfExists('registration');
    }
}
