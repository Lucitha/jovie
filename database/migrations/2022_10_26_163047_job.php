<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Job extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('job', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->references('id')->on('company');
            $table->string('title');
            $table->string('type');
            $table->string('category');
            $table->string('location');
            $table->string('contact');
            $table->string('company_name');
            $table->string('description');
            $table->string('conditions');
            $table->dateTime('updated_at');
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
