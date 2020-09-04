<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classinfos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lessons_weeks');
            $table->string('lessons_subject');
            $table->string('lessons_content');
            $table->string('lessons_video')->nullable();
            $table->string('lessons_pdf')->nullable();
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
        Schema::dropIfExists('classinfos');
    }
}
