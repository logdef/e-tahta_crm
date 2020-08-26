<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('school_id');
            $table->string('national_id')->nullable();
            $table->integer('salary_grade_id');
            $table->string('salary_type');
            $table->string('responsibility');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('gender');
            $table->string('blood_group');
            $table->string('religion')->nullable();
            $table->date('dob');
            $table->date('joining_date');
            $table->date('resign_date')->nullable();
            $table->string('photo')->nullable();
            $table->string('resume')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('google_plus_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('pinterest_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->tinyInteger('is_view_on_web');
            $table->text('other_info')->nullable();
            $table->integer('display_order')->nullable();
            $table->tinyInteger('status');
            $table->integer('created_by');
            $table->integer('modified_by');
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
        Schema::dropIfExists('teachers');
    }
}
