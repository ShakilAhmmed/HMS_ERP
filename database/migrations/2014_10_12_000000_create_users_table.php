<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('users_id');
            $table->string('users_name',50);
            $table->string('guardian_name',50)->nullable();
            $table->string('address',255);
            $table->string('phone',15);
            $table->string('sex',20);
            $table->date('birth_date')->nullable();
            $table->integer('age')->nullable();
            $table->string('blood_group',5)->nullable();
            $table->integer('department_id');
            $table->integer('designation_id');
            $table->integer('shift_id');
            $table->string('working_hours',10)->nullable();
            $table->string('status',1)->default(1)->comment('1= active, 2=inactive');
            $table->string('image',255)->nullable();
            $table->string('email',50)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',255);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
