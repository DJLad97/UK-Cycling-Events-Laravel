<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('races', function (Blueprint $table) {
            $table->increments('raceID');
            $table->string('raceType', 10);
            $table->string('organiserName', 100);
            $table->string('organiserEmail', 100);
            $table->string('raceName', 100);
            $table->date('raceDate');
            $table->text('raceDescription', 100);
            $table->string('raceAddress', 100);
            $table->string('racePostcode', 30);
            $table->string('raceCoordinates', 50);
            $table->tinyInteger('isFree')->nullable();
            $table->decimal('entryPrice', 10, 2)->nullable();
            $table->date('closingEntryDate');
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
        Schema::dropIfExists('races');
    }
}
