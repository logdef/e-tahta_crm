<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('student_id');
            $table->integer('package_id')->unsigned();
            $table->foreign('package_id')->references('id')->on('lessonspackages')->onDelete('cascade');
            $table->enum('student_status',['0','1'])->default(0);
            $table->dateTime('start_time')->nullable();
            $table->string('default1')->nullable();
            $table->string('default2')->nullable();
            $table->string('default3')->nullable();
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
        Schema::dropIfExists('student_packages');
    }
}
