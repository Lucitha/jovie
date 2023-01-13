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
            $table->string('users_name');             
            $table->string('users_email');             
            $table->string('users_address');             
            $table->string('users_jobs');             
            $table->string('users_phone');             
            $table->string('users_password');             
            $table->string('users_post_office_box');             
            $table->string('users_social_link');             
            $table->string('users_description');             
            $table->string('users_picture');             
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
