<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLassignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lassigns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lessons_id');
            $table->foreign('lessons_id')->references('id')->on('lessons')->onDelete('cascade');

            $table->integer('users_id');
//            $table->foreign('users_id')->references('user_id')->on('teachers')->onDelete('cascade');

            $table->string('lassign_default1')->nullable();
            $table->string('lassign_default2')->nullable();

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
        Schema::dropIfExists('lassigns');
    }
}
