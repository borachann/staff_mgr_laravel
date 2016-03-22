<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStaffsTable extends Migration
{

    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->increments('id');
            $table->char('fp_number', 10)->unique();
            $table->char('name', 50);
            $table->char('gender', 1);
            $table->char('position', 100);
            $table->date('dob');
            $table->char('skill', 50)->nullable();
            $table->char('level', 50)->nullable();
            $table->boolean('readable');
            $table->char('ld_grp', 50)->nullable();
            $table->char('phone', 10)->nullable();
            $table->char('work_grp', 50)->nullable();
            $table->string('photo_path')->nullable();
            $table->string('file_path')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('staffs');
    }
}
