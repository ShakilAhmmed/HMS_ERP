<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmbulanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ambulance', function (Blueprint $table) {
            $table->bigIncrements('ambulance_id');
            $table->string('vehicle_number');
            $table->string('vehicle_mode');
            $table->integer('year_made');
            $table->string('driver_name');
            $table->string('driver_contact');
            $table->string('driver_license');
            $table->string('vehicle_type');
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
        Schema::dropIfExists('ambulance');
    }
}
