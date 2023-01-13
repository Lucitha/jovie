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
            $table->string('jobs_name');
            $table->string('jobs_description');
            $table->string('jobs_conditions');
            $table->string('jobs_salary')->nullable();
            $table->string('jobs_contacts');
            $table->string('jobs_location');
            $table->string('jobs_company_name');
            $table->string('jobs_status');
            $table->dateTime('jobs_start_at');
            $table->dateTime('jobs_end_at');
            $table->foreignId('type_id')->references('id')->on('types');
            $table->foreignId('category_id')->reference('id')->on('categories');
            $table->foreignId('posted_by')->references('id')->on('users');
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
