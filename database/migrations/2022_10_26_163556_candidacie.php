<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Candidacie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('candidacie', function (Blueprint $table) {
            $table->id();
            $table->string('resum');
            $table->string('contact');
            $table->foreignId('candidate_id')->references('id')->on('candidate');
            $table->foreignId('job_id')->references('id')->on('job');
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
