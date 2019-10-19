<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system', function (Blueprint $table) {
            $table->bigIncrements('system_id');
            $table->string('system_name');
            $table->string('system_title');
            $table->text('address');
            $table->string('phone');
            $table->string('paypal_email');
            $table->string('purchase_code');
            $table->string('currency');
            $table->string('system_email');
            $table->string('system_language');
            $table->string('logo');
            $table->string('text_align');
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
        Schema::dropIfExists('system');
    }
}
