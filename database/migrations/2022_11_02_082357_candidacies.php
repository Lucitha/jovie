<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Candidacies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('candidacies', function (Blueprint $table) {            
            $table->id();             
            $table->string('resum');             
            $table->string('contact');             
            $table->foreignId('candidate_id')->references('id')->on('users');             
            $table->foreignId('job_id')->references('id')->on('jobs');             
            $table->dateTime('start_at');             
            $table->dateTime('end_at'); 
            $table->dateTime('created_at');         
            $table->dateTime('updated_at')->nullable();             
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
