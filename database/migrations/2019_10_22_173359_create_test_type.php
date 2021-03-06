<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_type', function (Blueprint $table) {
            $table->bigIncrements('test_type_id');
            $table->string('test_type_name',50);
            $table->integer('test_sub_category_id');
            $table->text('description')->nullable();
            $table->integer('status')->index()->comment('1=Active,2=Inactive');
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
        Schema::dropIfExists('test_type');
    }
}
