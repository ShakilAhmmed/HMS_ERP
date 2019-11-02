<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmbulanceCallTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ambulance_call', function (Blueprint $table) {
            $table->bigIncrements('ambulancecall_id');
            $table->integer('ambulance_id');
            $table->integer('patient_id');
            $table->text('from');
            $table->text('to');
            $table->integer('amount');
            $table->string('contact_no');
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
        Schema::dropIfExists('ambulance_call');
    }
}
