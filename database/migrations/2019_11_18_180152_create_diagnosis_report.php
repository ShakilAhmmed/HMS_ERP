<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosisReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosis_report', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('patient_id');
            $table->integer('doctor_id');
            $table->integer('prescription_id');
            $table->integer('test_id');
            $table->date('delivery_date');
            $table->text('description');
            $table->string('file');
            $table->integer('ready_or_not')->default(1)->comment('1= on_lab, 2=available, 3=delivered');
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
        Schema::dropIfExists('diagnosis_report');
    }
}
