<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonspackageproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessonspackageproducts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('package_id')   ->unsigned();
            $table->foreign('package_id')->references('id')->on('lessonspackages')->onDelete('cascade');
            $table->bigInteger('lassign_id')->unsigned();
            $table->foreign('lassign_id')->references('id')->on('lassigns')->onDelete('cascade');

            $table->string('lessons_package_name');
            $table->decimal('lessons_package_price',5,2);
            $table->string('lessons_package_code');
            $table->string('lessons_package_default2')->nullable();
            $table->string('lessons_package_default3')->nullable();




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
        Schema::dropIfExists('lessonspackageproducts');
    }
}
