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
            $table->increments('id');
            $table->string('type', 10);
            $table->string('organiser_name', 100);
            $table->string('organiser_email', 100);
            $table->string('title', 100);
            $table->date('start_date');
            $table->date('closing_entry_date');
            $table->text('description', 100);
            $table->string('address', 100);
            $table->string('postcode', 30);
            $table->string('coordinates', 50);
            $table->tinyInteger('is_free')->nullable();
            $table->decimal('entry_price', 10, 2)->nullable();
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
