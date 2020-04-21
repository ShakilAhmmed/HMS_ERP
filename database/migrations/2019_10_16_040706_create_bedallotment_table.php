<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBedallotmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bedallotment', function (Blueprint $table) {
            $table->bigIncrements('bedallotment_id');
            $table->integer('patient_id');
            $table->integer('bed_id');
            $table->datetime('allotment_time');
            $table->datetime('discharge_time');
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
        Schema::dropIfExists('bedallotment');
    }
}
