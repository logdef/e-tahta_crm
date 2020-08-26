<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('school_name');
            $table->integer('school_year');
            $table->enum('school_period',['0','1']);
            $table->string('lessons_name');
            $table->string('lessons_code');
            $table->string('lessons_price');
            $table->string('lessons_content');
            $table->string('lessons_time');
            $table->string('lessons_default1')->nullable();
            $table->string('lessons_default2')->nullable();
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
        Schema::dropIfExists('lessons');
    }
}
