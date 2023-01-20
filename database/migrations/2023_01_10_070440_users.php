<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('users', function (Blueprint $table) {            
            $table->id();             
            $table->string('users_name')->nullable();             
            $table->string('users_email');             
            $table->string('users_address')->nullable();             
            $table->string('users_jobs')->nullable();             
            $table->string('users_phone')->nullable();             
            $table->string('users_password');             
            $table->string('users_post_office_box')->nullable();             
            $table->string('users_social_link')->nullable();             
            $table->string('users_description')->nullable();             
            $table->string('users_picture')->nullable();             
            $table->string('users_flag');             
            $table->foreignId('roles_id')->references('id')->on('roles');             
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
