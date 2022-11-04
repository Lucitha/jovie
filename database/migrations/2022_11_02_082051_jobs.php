<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Jobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('posted_by')->references('id')->on('users');
            $table->string('job_title');
            $table->foreignId('type_id')->references('id')->on('types');
            $table->string('category_id')->reference('id')->on('categories');
            $table->string('location');
            $table->string('job_contact');
            $table->string('company_name');
            $table->string('company_email');
            $table->string('job_description');
            $table->string('job_conditions');
            $table->string('salary_range')->nullable();
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('created_at');
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
