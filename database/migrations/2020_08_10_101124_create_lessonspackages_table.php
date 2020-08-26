<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonspackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessonspackages', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('users_id')->unsigned()->nullable();
            $table->string('package_name');
            $table->string('package_content')->nullable();
            $table->string('package_code');
            $table->decimal('package_price',5,2)->nullable();
            $table->integer('package_discount')->nullable();
            $table->enum('package_status',['0','1'])->default(1);
            $table->string('package_default1')->nullable();
            $table->string('package_default2')->nullable();
            $table->string('package_default3')->nullable();

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
        Schema::dropIfExists('lessonspackages');
    }
}
