<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class About extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('desc');
            $table->date('birthday');
            $table->string('website');
            $table->string('phone');
            $table->string('city');
            $table->string('age');
            $table->string('degree');
            $table->string('email');
            $table->string('work');
            $table->string('photo');
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
        //
    }
}
