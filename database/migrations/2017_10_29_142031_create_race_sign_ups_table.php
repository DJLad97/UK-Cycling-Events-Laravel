<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRaceSignUpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('race_sign_ups', function (Blueprint $table) {
            $table->integer('race_id');
            // $table->foreign('race_id')->references('id')->on('races');
            $table->integer('user_id');
            // $table->foreign('user_id')->references('id')->on('users');
            $table->string('name', 100);
            $table->enum('gender', ['M', 'F']);
            $table->string('age_range', 10);
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
        Schema::dropIfExists('race_sign_ups');
    }
}
